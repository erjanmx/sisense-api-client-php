<?php

namespace Sisense\Tests\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;
use Sisense\Exceptions\MethodNotSupported;

/**
 * Class RolesTest
 */
class RolesTest extends TestCase
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
     * @covers \Sisense\Api\V09\Roles::getAll()
     */
    public function testGetAll()
    {
        $parameters = ['foo' => 'bar'];

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('roles/', 'GET', ['query' => $parameters])
            ->willReturn([]);

        $this->clientMock->roles->getAll($parameters);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::getRole()
     */
    public function testGetRole()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('roles/1', 'GET')
            ->willReturn([]);

        $this->clientMock->roles->getRole('1');
    }

    /**
     * @covers \Sisense\Api\V09\Roles::addRole()
     */
    public function testAddRole()
    {
        $this->expectException(MethodNotSupported::class);

        $this->clientMock->roles->addRole();
    }

    /**
     * @covers \Sisense\Api\V09\Roles::deleteRole()
     */
    public function testDeleteRole()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('roles/1', 'DELETE')
            ->willReturn([]);

        $this->clientMock->roles->deleteRole('1');
    }

    /**
     * @covers \Sisense\Api\V09\Roles::updateRole()
     */
    public function testUpdateRole()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('roles/1', 'PUT', ['role' => ['foo']])
            ->willReturn([]);

        $this->clientMock->roles->updateRole('1', ['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::getRolePathPermissions()
     */
    public function testGetRolePathPermissions()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('roles/1/manifest/p', 'GET', ['query' => ['compiledRole' => true]])
            ->willReturn([]);

        $this->clientMock->roles->getRolePathPermissions('1', 'p', true);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::deletePathPermissions()
     */
    public function testDeletePathPermissions()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('roles/1/manifest/p', 'DELETE')
            ->willReturn([]);

        $this->clientMock->roles->deletePathPermissions('1', 'p');
    }

    /**
     * @covers \Sisense\Api\V09\Roles::updatePathPermissions()
     */
    public function testUpdatePathPermissions()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('roles/1/manifest/p', 'PUT', ['manifest' => ['foo']])
            ->willReturn([]);

        $this->clientMock->roles->updatePathPermissions('1', 'p', ['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::updatePathManifest()
     */
    public function testUpdatePathManifest()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('roles/1/manifest/p', 'POST', ['form_params' => ['manifest' => ['foo']]])
            ->willReturn([]);

        $this->clientMock->roles->updatePathManifest('1', 'p', ['foo']);
    }
}
