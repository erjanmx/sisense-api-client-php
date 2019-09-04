<?php

namespace Sisense\Tests;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class UsersTest
 */
class UsersTest extends TestCase
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
     * @covers \Sisense\Api\Users::getAll()
     */
    public function testGetAll()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/', 'GET', ['query' => ['parameters']])
            ->willReturn([]);

        $this->clientMock->users->getAll(['parameters']);
    }

    /**
     * @covers \Sisense\Api\Users::getUser()
     */
    public function testGetUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/1', 'GET', ['query' => ['fields' => 'field-1', 'expand' => 'expand']])
            ->willReturn([]);

        $this->clientMock->users->getUser(1, 'field-1', 'expand');
    }

    /**
     * @covers \Sisense\Api\Users::addUser()
     */
    public function testAddUser()
    {
        $user = [
            'userName' => 'un',
            'firstName' => 'fn',
            'lastName' => 'ln',
        ];

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/', 'POST', ['form_params' => $user])
            ->willReturn([]);

        $this->clientMock->users->addUser($user);
    }
}
