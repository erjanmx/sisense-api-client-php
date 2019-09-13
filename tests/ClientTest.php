<?php

namespace Sisense\Tests;

use Sisense\Client;
use Sisense\ClientInterface;
use InvalidArgumentException;
use Sisense\Api\Authentication;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ClientTest
 */
class ClientTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    public function setUp()
    {
        parent::setUp();

        $this->client = new Client('http://localhost/');
    }

    /**
     * @covers \Sisense\Client
     */
    public function testImplementsInterface()
    {
        $this->assertInstanceOf(ClientInterface::class, $this->client);
    }

    /**
     * @covers \Sisense\Client::getBaseUrl()
     */
    public function testInitWithBaseUrl()
    {
        $this->assertSame('http://localhost/', $this->client->getBaseUrl());
    }

    /**
     * @covers \Sisense\Client::getHttp()
     */
    public function testInitWithDefaultHttpAdapter()
    {
        $this->assertInstanceOf(\GuzzleHttp\ClientInterface::class, $this->client->getHttp());
    }

    /**
     * @covers \Sisense\Client
     */
    public function testFailsOnNotExistApiMethod()
    {
        $this->expectException(InvalidArgumentException::class);

        $this->client->api('do_not_exist');
    }

    /**
     * @covers \Sisense\Client::runRequest()
     */
    public function testRunRequestUsesAuthentication()
    {
        $token = 'token';

        $httpMock = $this->createMock(\GuzzleHttp\ClientInterface::class);
        $requestMock = $this->createMock(ResponseInterface::class);
        $bodyMock = $this->createMock(StreamInterface::class);

        $requestMock
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($bodyMock);
        $httpMock
            ->expects($this->once())
            ->method('request')
            ->with('GET', 'path', ['headers' => ['Authorization' => 'Bearer ' . $token]])
            ->willReturn($requestMock);

        $client = new Client('', [], $httpMock);
        $client->useAccessToken($token);

        $client->runRequest('path', 'GET');
    }

    /**
     * @covers \Sisense\Client::runRequest()
     */
    public function testRunRequestDoesntAddAuthorizationHeaderIfSpecified()
    {
        $token = 'token';

        $httpMock = $this->createMock(\GuzzleHttp\ClientInterface::class);
        $requestMock = $this->createMock(ResponseInterface::class);
        $bodyMock = $this->createMock(StreamInterface::class);

        $requestMock
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($bodyMock);
        $httpMock
            ->expects($this->once())
            ->method('request')
            ->with('GET', 'path', ['headers' => [
                'User-Agent' => 'Browser',
                'Authorization' => 'BEARER OLD_TOKEN']
            ])
            ->willReturn($requestMock);

        $client = new Client('', [], $httpMock);
        $client->useAccessToken($token);

        $client->runRequest('path', 'GET', [
            'headers' => ['User-Agent' => 'Browser', 'Authorization' => 'BEARER OLD_TOKEN']
        ]);
    }

    /**
     * @covers \Sisense\Client::get()
     */
    public function testGet()
    {
        $clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $clientMock->expects($this->once())
            ->method('runRequest')
            ->with('path', 'GET', ['query' => ['foo' => 'bar']])
            ->willReturn([]);

        $clientMock->get('path', ['query' => ['foo' => 'bar']]);
    }

    /**
     * @covers \Sisense\Client::post()
     */
    public function testPost()
    {
        $clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $clientMock->expects($this->once())
            ->method('runRequest')
            ->with('path', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $clientMock->post('path', ['form_params' => ['foo' => 'bar']]);
    }

    /**
     * @covers \Sisense\Client::put()
     */
    public function testPut()
    {
        $clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $clientMock->expects($this->once())
            ->method('runRequest')
            ->with('path', 'PUT', ['foo' => 'bar'])
            ->willReturn([]);

        $clientMock->put('path', ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Client::delete()
     */
    public function testDelete()
    {
        $clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $clientMock->expects($this->once())
            ->method('runRequest')
            ->with('path', 'DELETE', ['foo' => 'bar'])
            ->willReturn([]);

        $clientMock->delete('path', ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Client::patch()
     */
    public function testPatch()
    {
        $clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $clientMock->expects($this->once())
            ->method('runRequest')
            ->with('path', 'PATCH', ['foo' => 'bar'])
            ->willReturn([]);

        $clientMock->patch('path', ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Client::authenticate()
     */
    public function testAuthenticateFailsWithNoCredentials()
    {
        $client = new Client('http://localhost/');

        $this->expectException(InvalidArgumentException::class);

        $client->authenticate();
    }

    /**
     * @covers \Sisense\Client::authenticate()
     */
    public function testAuthenticateWithSpecifiedCredentials()
    {
        $clientMock = $this->createPartialMock(Client::class, ['v', 'api', 'useAccessToken']);
        $authenticationMock = $this->createPartialMock(Authentication::class, ['login']);

        $authenticationMock->expects($this->once())
            ->method('login')
            ->with('u', 'p')
            ->willReturn([
                'access_token' => 't'
            ]);

        $clientMock->expects($this->once())
            ->method('api')
            ->with('authentication')
            ->willReturn($authenticationMock);

        $clientMock->expects($this->once())
            ->method('v')
            ->with('v1.0')
            ->willReturn($clientMock);

        $clientMock->expects($this->once())
            ->method('useAccessToken')
            ->with('t');

        $clientMock->authenticate('u', 'p');
    }

    /**
     * @covers \Sisense\Client::api()
     */
    public function testFailsOnNotSupportedVersion()
    {
        $client = new Client('http://localhost/');

        $this->expectException(InvalidArgumentException::class);

        $client->v('not_existent_version')->users;
    }

    /**
     * @covers \Sisense\Client::api()
     */
    public function testApiUsesOnCallVersion()
    {
        $client = new Client('http://localhost/', [
            'default_version' => 'v1.0',
        ]);

        // uses v0.9 for one call only
        $authorization = $client->v('v0.9')->authorization;

        // and then switches back to default version
        $authentication = $client->authentication;

        $this->assertInstanceOf(\Sisense\Api\V09\Authorization::class, $authorization);
        $this->assertInstanceOf(\Sisense\Api\Authentication::class, $authentication);
    }

    /**
     * @covers \Sisense\Client::api()
     */
    public function testUseVersionWithSetAsDefault()
    {
        $client = new Client('http://localhost/', [
            'default_version' => 'v1.0',
        ]);

        $setAsDefault = true;
        // uses v0.9
        $client->v('v0.9', $setAsDefault)->authorization;

        // and stays on that version
        $authorization = $client->authorization;

        $this->assertInstanceOf(\Sisense\Api\V09\Authorization::class, $authorization);
    }

    /**
     * @covers \Sisense\Client::api()
     */
    public function testApiCachesPreviousCall()
    {
        $client = new Client('http://localhost/');

        $users_1 = $client->users;
        $users_2 = $client->users;

        $this->assertSame($users_1, $users_2);
    }

    /**
     * @covers \Sisense\Client::getAccessToken()
     */
    public function testGetAccessToken()
    {
        $client = new Client('http://localhost/', ['access_token' => 'token']);

        $this->assertEquals('token', $client->getAccessToken());
    }
}
