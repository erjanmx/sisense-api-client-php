<?php

namespace Sisense\Tests\Api\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class AuthorizationTest
 *
 */
class AuthorizationTest extends TestCase
{
    /**
     * @var MockObject|Client
     */
    protected $clientMock;


    public function setUp()
    {
        parent::setUp();

        $this->clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $this->clientMock->useVersion('v0.9', true);
    }

    public function expects($path, $method, $options = [])
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with($path, $method, $options)
            ->willReturn([]);
    }

    public function testIsAuthenticated()
    {
        $this->expects('auth/isauth', 'GET');

        $this->clientMock->authorization->isAuthenticated();
    }

    public function testLogout()
    {
        $this->expects('auth/logout', 'GET');

        $this->clientMock->authorization->logout();
    }
}
