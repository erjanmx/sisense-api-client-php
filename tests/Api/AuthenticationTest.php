<?php

namespace Sisense\Tests;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class AuthenticationTest
 */
class AuthenticationTest extends TestCase
{
    /**
     * @var MockObject|Client
     */
    protected $clientMock;


    public function setUp()
    {
        parent::setUp();

        $this->clientMock = $this->createPartialMock(Client::class, ['runRequest']);
    }

    /**
     * @covers \Sisense\Api\Authentication::login
     */
    public function testLogin()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/authentication/login', 'POST', ['form_params' => ['username' => 'u', 'password' => 'p']])
            ->willReturn([]);

        $this->clientMock->authentication->login('u', 'p');
    }

    /**
     * @covers \Sisense\Api\Authentication::logout
     */
    public function testLogout()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/authentication/logout', 'GET', ['query' => ['targetDevice' => 'c']])
            ->willReturn([]);

        $this->clientMock->authentication->logout('c');
    }
}
