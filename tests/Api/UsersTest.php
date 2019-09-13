<?php

namespace Tests\Api;

/**
 * Class UsersTest
 */
class UsersTest extends BaseApiTest
{
    /**
     * @covers \Sisense\Api\Users::getAll()
     */
    public function testGetAll()
    {
        $this->expects('v1/users/', 'GET', ['query' => ['parameters']]);

        $this->clientMock->users->getAll(['parameters']);
    }

    /**
     * @covers \Sisense\Api\Users::getUser()
     */
    public function testGetUser()
    {
        $this->expects('v1/users/1', 'GET', ['query' => ['fields' => 'field-1', 'expand' => 'expand']]);

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

        $this->expects('v1/users/', 'POST', ['json' => $user]);

        $this->clientMock->users->addUser($user);
    }

    /**
     * @covers \Sisense\Api\Users::addADUser()
     */
    public function testAddADUser()
    {
        $this->expects('v1/users/ad', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->users->addADUser(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::addBulk()
     */
    public function testAddBulk()
    {
        $this->expects('v1/users/bulk', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->users->addBulk(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::addADBulk()
     */
    public function testAddADBulk()
    {
        $this->expects('v1/users/ad/bulk', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->users->addADBulk(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::updateUser()
     */
    public function testUpdateUser()
    {
        $this->expects('v1/users/1', 'PATCH', ['json' => ['foo' => 'bar']]);

        $this->clientMock->users->updateUser(1, ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::deleteUsers()
     */
    public function testDeleteUsers()
    {
        $this->expects('v1/users/bulk', 'DELETE', ['foo' => 'bar']);

        $this->clientMock->users->deleteUsers(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\Users::deleteUser()
     */
    public function testDeleteUser()
    {
        $this->expects('v1/users/1', 'DELETE');

        $this->clientMock->users->deleteUser(1);
    }
}
