<?php

namespace Sisense\Tests\V09;

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

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getAll()
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
     * @covers \Sisense\Api\V09\Users::getAllAd()
     */
    public function testGetAllAd()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/ad', 'GET', ['query' => ['parameters']])
            ->willReturn([]);

        $this->clientMock->users->getAllAd(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getAllInDirectories()
     */
    public function testGetAllInDirectories()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/allDirectories', 'GET', ['query' => ['parameters']])
            ->willReturn([]);

        $this->clientMock->users->getAllInDirectories(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getCount()
     */
    public function testGetCount()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/count', 'GET')
            ->willReturn([]);

        $this->clientMock->users->getCount(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getUser()
     */
    public function testGetUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/1', 'GET')
            ->willReturn([]);

        $this->clientMock->users->getUser(1);
    }

    /**
     * @covers \Sisense\Api\V09\Users::getLoggedIn()
     */
    public function testGetLoggedIn()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/loggedin', 'GET')
            ->willReturn([]);

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

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/', 'POST', ['form_params' => $user])
            ->willReturn([]);

        $this->clientMock->users->addUser($user);
    }

    /**
     * @covers \Sisense\Api\V09\Users::simulate()
     */
    public function testSimulate()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/simulate', 'POST', ['form_params' => ['foo']])
            ->willReturn([]);

        $this->clientMock->users->simulate(['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::importFromActiveDirectory()
     */
    public function testImportFromActiveDirectory()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/ad', 'POST', ['form_params' => ['foo']])
            ->willReturn([]);

        $this->clientMock->users->importFromActiveDirectory(['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::forgetPassword()
     */
    public function testForgetPassword()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/forgetpassword', 'POST', ['form_params' => ['userEmail' => 'foo']])
            ->willReturn([]);

        $this->clientMock->users->forgetPassword('foo');
    }

    /**
     * @covers \Sisense\Api\V09\Users::deleteUser()
     */
    public function testDeleteUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/delete', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->users->deleteUser(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::validate()
     */
    public function testValidate()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/validate', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->users->validate(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::updateUser()
     */
    public function testUpdateUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/u', 'PUT', ['foo' => 'bar'])
            ->willReturn([]);

        $this->clientMock->users->updateUser('u', ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Users::deleteByIdOrUserName()
     */
    public function testDeleteByIdOrUserName()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('users/u', 'DELETE')
            ->willReturn([]);

        $this->clientMock->users->deleteByIdOrUserName('u');
    }
}
