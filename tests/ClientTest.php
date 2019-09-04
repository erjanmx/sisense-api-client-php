<?php

namespace Sisense\Tests;

use Sisense\Client;
use Sisense\ClientInterface;
use InvalidArgumentException;
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

        $this->client = new Client('http://localhost/v1/');
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
        $this->assertSame('http://localhost/v1/', $this->client->getBaseUrl());
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
        $client->setAccessToken($token);

        $client->runRequest('path', 'GET');
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

        $clientMock->get('path', ['foo' => 'bar']);
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

        $clientMock->post('path', ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Client::authenticate()
     */
    public function testAuthenticate()
    {
        $this->markTestIncomplete();
    }
}
