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
            ->with('v1/users/', 'GET', ['query' => ['parameters']])
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
            ->with('v1/users/1', 'GET', ['query' => ['fields' => 'field-1', 'expand' => 'expand']])
            ->willReturn([]);

        $this->clientMock->users->getUser(1, ['fields' => 'field-1', 'expand' => 'expand']);
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
            ->with('v1/users/', 'POST', ['form_params' => $user])
            ->willReturn([]);

        $this->clientMock->users->addUser($user);
    }

    /**
     * @covers \Sisense\Api\Users::addADUser()
     */
    public function testAddADUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/users/ad', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->users->addADUser(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::addBulk()
     */
    public function testAddBulk()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/users/bulk', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->users->addBulk(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::addADBulk()
     */
    public function testAddADBulk()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/users/ad/bulk', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->users->addADBulk(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::updateUser()
     */
    public function testUpdateUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/users/1', 'PATCH', ['foo' => 'bar'])
            ->willReturn([]);

        $this->clientMock->users->updateUser(1, ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::deleteUsers()
     */
    public function testDeleteUsers()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/users/bulk', 'DELETE', ['foo' => 'bar'])
            ->willReturn([]);

        $this->clientMock->users->deleteUsers(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::deleteUser()
     */
    public function testDeleteUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/users/1', 'DELETE')
            ->willReturn([]);

        $this->clientMock->users->deleteUser(1);
    }
}
