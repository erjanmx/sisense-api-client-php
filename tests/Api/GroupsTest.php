<?php

namespace Sisense\Tests;

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
    }

    /**
     * @covers \Sisense\Api\Groups::getAll()
     */
    public function testGetAll()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/groups/', 'GET', ['query' => ['parameters']])
            ->willReturn([]);

        $this->clientMock->groups->getAll(['parameters']);
    }

    /**
     * @covers \Sisense\Api\Groups::getGroup()
     */
    public function testGetUser()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/groups/1', 'GET', ['query' => ['fields' => 'field-1', 'expand' => 'expand']])
            ->willReturn([]);

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

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('v1/groups/', 'POST', ['form_params' => $group])
            ->willReturn([]);

        $this->clientMock->groups->addGroup($group);
    }
}
