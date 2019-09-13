<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class GroupsTest
 */
class GroupsTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getAll()
     */
    public function testGetAll()
    {
        $parameters = ['foo' => 'bar'];

        $this->expects('groups/', 'GET', ['query' => $parameters]);

        $this->clientMock->groups->getAll($parameters);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getAllAD()
     */
    public function testGetAllAD()
    {
        $this->expects('groups/ad', 'GET', ['query' => ['foo' => 'bar']]);

        $this->clientMock->groups->getAllAD(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getAllDirectories()
     */
    public function testGetAllDirectories()
    {
        $this->expects('groups/allDirectories', 'GET', ['query' => ['foo' => 'bar']]);

        $this->clientMock->groups->getAllDirectories(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getGroup()
     */
    public function testGetGroup()
    {
        $this->expects('groups/1', 'GET');

        $this->clientMock->groups->getGroup(1);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getUsersInGroup()
     */
    public function testGetUsersInGroup()
    {
        $this->expects('groups/1/users', 'GET');

        $this->clientMock->groups->getUsersInGroup(1);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::getAllByIds()
     */
    public function testGetGroupsByUser()
    {
        $this->expects('groups/byIds', 'POST', ['json' => ['1'], 'query' => [
                'usersCount' => false,
                'includeDomain' => false,
            ]]);

        $this->clientMock->groups->getAllByIds(['1']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::addGroup()
     */
    public function testAddGroup()
    {
        $this->expects('groups/', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->groups->addGroup(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::addADGroup()
     */
    public function testAddADGroup()
    {
        $this->expects('groups/ad', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->groups->addADGroup(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::addUsersToGroup()
     */
    public function testAddUsersToGroup()
    {
        $this->expects('groups/1/users', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->groups->addUsersToGroup(1, ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::validateName()
     */
    public function testValidateName()
    {
        $this->expects('groups/validateName', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->groups->validateName(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::updateGroup()
     */
    public function testUpdateGroup()
    {
        $this->expects('groups/1', 'PUT', ['json' => ['foo' => 'bar']]);

        $this->clientMock->groups->updateGroup(1, ['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::deleteGroups()
     */
    public function testDeleteGroups()
    {
        $this->expects('groups/', 'DELETE', ['json' => ['foo' => 'bar']]);

        $this->clientMock->groups->deleteGroups(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::deleteGroup()
     */
    public function testDeleteGroup()
    {
        $this->expects('groups/1', 'DELETE', ['json' => ['deleteAdUsers' => true]]);

        $this->clientMock->groups->deleteGroup(1, true);
    }

    /**
     * @covers \Sisense\Api\V09\Groups::deleteUsers()
     */
    public function testDeleteUsers()
    {
        $this->expects('groups/1/users', 'DELETE', ['json' => ['foo', 'bar']]);

        $this->clientMock->groups->deleteUsers(1, ['foo', 'bar']);
    }
}
