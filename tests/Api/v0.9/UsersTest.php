<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class UsersTest
 */
class UsersTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getAll()
     */
    public function testGetAll()
    {
        $this->expects('users/', 'GET', ['query' => ['parameters']]);

        $this->clientMock->users->getAll(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getAllAd()
     */
    public function testGetAllAd()
    {
        $this->expects('users/ad', 'GET', ['query' => ['parameters']]);

        $this->clientMock->users->getAllAd(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getAllInDirectories()
     */
    public function testGetAllInDirectories()
    {
        $this->expects('users/allDirectories', 'GET', ['query' => ['parameters']]);

        $this->clientMock->users->getAllInDirectories(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getCount()
     */
    public function testGetCount()
    {
        $this->expects('users/count', 'GET', ['query' => ['parameters']]);

        $this->clientMock->users->getCount(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getUser()
     */
    public function testGetUser()
    {
        $this->expects('users/1', 'GET');

        $this->clientMock->users->getUser(1);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getLoggedIn()
     */
    public function testGetLoggedIn()
    {
        $this->expects('users/loggedin', 'GET');

        $this->clientMock->users->getLoggedIn();
    }

    /**
     * @covers \Sisense\Api\V09\Users::addUser()
     */
    public function testAddUser()
    {
        $user = [
            'userName' => 'un',
            'firstName' => 'fn',
            'lastName' => 'ln',
        ];

        $this->expects('users/', 'POST', ['json' => $user, 'query' => ['notify' => '']]);

        $this->clientMock->users->addUser($user);
    }

    /**
     * @covers \Sisense\Api\V09\Users::simulate()
     */
    public function testSimulate()
    {
        $this->expects('users/simulate', 'POST', ['json' => ['foo']]);

        $this->clientMock->users->simulate(['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::importFromActiveDirectory()
     */
    public function testImportFromActiveDirectory()
    {
        $this->expects('users/ad', 'POST', ['json' => ['user' => ['foo']]]);

        $this->clientMock->users->importFromActiveDirectory(['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::forgetPassword()
     */
    public function testForgetPassword()
    {
        $this->expects('users/forgetpassword', 'POST', ['json' => ['userEmail' => 'foo']]);

        $this->clientMock->users->forgetPassword('foo');
    }

    /**
     * @covers \Sisense\Api\V09\Users::deleteUser()
     */
    public function testDeleteUser()
    {
        $this->expects('users/delete', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->users->deleteUser(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::validate()
     */
    public function testValidate()
    {
        $this->expects('users/validate', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->users->validate(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::updateUser()
     */
    public function testUpdateUser()
    {
        $this->expects('users/u', 'PUT', ['foo' => 'bar']);

        $this->clientMock->users->updateUser('u', ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::deleteByIdOrUserName()
     */
    public function testDeleteByIdOrUserName()
    {
        $this->expects('users/u', 'DELETE');

        $this->clientMock->users->deleteByIdOrUserName('u');
    }
}
