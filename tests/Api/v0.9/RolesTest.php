<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;
use Sisense\Exceptions\MethodNotSupported;

/**
 * Class RolesTest
 */
class RolesTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::getAll()
     */
    public function testGetAll()
    {
        $parameters = ['foo' => 'bar'];

        $this->expects('roles/', 'GET', ['query' => $parameters]);

        $this->clientMock->roles->getAll($parameters);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::getRole()
     */
    public function testGetRole()
    {
        $this->expects('roles/1', 'GET');

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
        $this->expects('roles/1', 'DELETE');

        $this->clientMock->roles->deleteRole('1');
    }

    /**
     * @covers \Sisense\Api\V09\Roles::updateRole()
     */
    public function testUpdateRole()
    {
        $this->expects('roles/1', 'PUT', ['role' => ['foo']]);

        $this->clientMock->roles->updateRole('1', ['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::getRolePathPermissions()
     */
    public function testGetRolePathPermissions()
    {
        $this->expects('roles/1/manifest/p', 'GET', ['query' => ['compiledRole' => true]]);

        $this->clientMock->roles->getRolePathPermissions('1', 'p', true);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::deletePathPermissions()
     */
    public function testDeletePathPermissions()
    {
        $this->expects('roles/1/manifest/p', 'DELETE');

        $this->clientMock->roles->deletePathPermissions('1', 'p');
    }

    /**
     * @covers \Sisense\Api\V09\Roles::updatePathPermissions()
     */
    public function testUpdatePathPermissions()
    {
        $this->expects('roles/1/manifest/p', 'PUT', ['manifest' => ['foo']]);

        $this->clientMock->roles->updatePathPermissions('1', 'p', ['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\Roles::updatePathManifest()
     */
    public function testUpdatePathManifest()
    {
        $this->expects('roles/1/manifest/p', 'POST', ['json' => ['manifest' => ['foo']]]);

        $this->clientMock->roles->updatePathManifest('1', 'p', ['foo']);
    }
}
