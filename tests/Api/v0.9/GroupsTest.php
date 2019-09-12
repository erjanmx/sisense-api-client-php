<?php

namespace Sisense\Tests\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class GroupsTest
 */
class GroupsTest extends TestCase
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
     * @covers \Sisense\Api\V09\Groups::getAll()
     */
    public function testGetAll()
    {
        $parameters = ['foo' => 'bar'];

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/', 'GET', ['query' => $parameters])
            ->willReturn([]);

        $this->clientMock->groups->getAll($parameters);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getAllAD()
     */
    public function testGetAllAD()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/ad', 'GET', ['query' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->groups->getAllAD(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getAllDirectories()
     */
    public function testGetAllDirectories()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/allDirectories', 'GET', ['query' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->groups->getAllDirectories(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getGroup()
     */
    public function testGetGroup()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/1', 'GET')
            ->willReturn([]);

        $this->clientMock->groups->getGroup(1);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getUsersInGroup()
     */
    public function testGetUsersInGroup()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/1/users', 'GET')
            ->willReturn([]);

        $this->clientMock->groups->getUsersInGroup(1);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getGroupsByUser()
     */
    public function testGetGroupsByUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/byIds', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->groups->getGroupsByUser(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::addGroup()
     */
    public function testAddGroup()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->groups->addGroup(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::addADGroup()
     */
    public function testAddADGroup()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/ad', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->groups->addADGroup(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::addUsersToGroup()
     */
    public function testAddUsersToGroup()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/1/users', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->groups->addUsersToGroup(1, ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::validateName()
     */
    public function testValidateName()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/validateName', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->groups->validateName(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::updateGroup()
     */
    public function testUpdateGroup()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/1', 'PUT', ['foo' => 'bar'])
            ->willReturn([]);

        $this->clientMock->groups->updateGroup(1, ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::deleteGroups()
     */
    public function testDeleteGroups()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/', 'DELETE', ['foo' => 'bar'])
            ->willReturn([]);

        $this->clientMock->groups->deleteGroups(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::deleteGroup()
     */
    public function testDeleteGroup()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/1', 'DELETE', ['deleteauthors' => true])
            ->willReturn([]);

        $this->clientMock->groups->deleteGroup(1, true);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::deleteUsers()
     */
    public function testDeleteUsers()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('groups/1/users', 'DELETE', ['foo' => 'bar'])
            ->willReturn([]);

        $this->clientMock->groups->deleteUsers(1, ['foo' => 'bar']);
    }
}
