<?php

namespace Tests\Api;

/**
 * Class GroupsTest
 */
class GroupsTest extends BaseApiTest
{
    /**
     * @covers \Sisense\Api\Groups::getAll()
     */
    public function testGetAll()
    {
        $this->expects('v1/groups/', 'GET', ['query' => ['parameters']]);

        $this->clientMock->groups->getAll(['parameters']);
    }

    /**
     * @covers \Sisense\Api\Groups::getGroup()
     */
    public function testGetUser()
    {
        $this->expects('v1/groups/1', 'GET', ['query' => ['fields' => 'field-1', 'expand' => 'expand']]);

        $this->clientMock->groups->getGroup(1, 'field-1', 'expand');
    }

    /**
     * @covers \Sisense\Api\Groups::addGroup()
     */
    public function testAddGroup()
    {
        $group = [
            'name' => 'n',
            'mail' => 'm',
        ];

        $this->expects('v1/groups/', 'POST', ['json' => $group]);

        $this->clientMock->groups->addGroup($group);
    }
}
