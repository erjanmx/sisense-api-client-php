<?php

namespace Sisense\Tests\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class AuthorizationTest
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

    /**
     * @covers \Sisense\Api\V09\Authorization::login
     */
    public function testIsAuth()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('auth/isauth', 'GET')
            ->willReturn([]);

        $this->clientMock->authorization->isAuth();
    }

    /**
     * @covers \Sisense\Api\V09\Authorization::logout
     */
    public function testLogout()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('auth/logout', 'GET')
            ->willReturn([]);

        $this->clientMock->authorization->logout();
    }
}
