<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;
use Sisense\Exceptions\MethodNotSupported;

/**
 * Class Roles
 *
 * @package Sisense\Api\V09
 */
class Roles extends AbstractApi
{
    protected $resourcePath = 'roles';

    /**
     * Returns all the role types and the enabled permissions per role type.
     *
     * @param array $parameters
     * @return array
     */
    public function getAll(array $parameters = []) : array
    {
        $path = $this->getPath();

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Returns the user role by role ID or role name.
     *
     * @param string $idOrName
     * @return array
     */
    public function getRole(string $idOrName) : array
    {
        $path = $this->getPath($idOrName);

        return $this->get($path);
    }

    /**
     * Adds a new role (currently not supported).
     *
     * @return array
     * @throws MethodNotSupported
     */
    public function addRole() : array
    {
        throw new MethodNotSupported();
    }

    /**
     * Deletes a user role by ID or name.
     *
     * @param string $idOrName
     * @return array
     */
    public function deleteRole(string $idOrName) : array
    {
        $path = $this->getPath($idOrName);

        return $this->delete($path);
    }

    /**
     * Updates a user role by role ID or name.
     *
     * @param string $idOrName
     * @param array $role
     * @return array
     */
    public function updateRole(string $idOrName, array $role) : array
    {
        $path = $this->getPath($idOrName);

        return $this->put($path, ['role' => $role]);
    }

    /**
     * Returns the permissions of a user role under a specific path in the role manifest.
     *
     * @param string $idOrName
     * @param string $path
     * @param bool $compiledRole
     * @return array
     */
    public function getRolePathPermissions(string $idOrName, string $path, bool $compiledRole = false) : array
    {
        $path = $this->getPath(sprintf('%s/manifest/%s', $idOrName, $path));

        return $this->get($path, ['query' => compact('compiledRole')]);
    }

    /**
     * Restores some or all permissions under a specific path in the role manifest.
     *
     * @param string $idOrName
     * @param string $path
     * @return array
     */
    public function deletePathPermissions(string $idOrName, string $path) : array
    {
        $path = $this->getPath(sprintf('%s/manifest/%s', $idOrName, $path));

        return $this->delete($path);
    }

    /**
     * Updates permissions in a user role manifest by role ID or name.
     *
     * @param string $idOrName
     * @param string $path
     * @param array $manifest
     * @return array
     */
    public function updatePathPermissions(string $idOrName, string $path, array $manifest) : array
    {
        $path = $this->getPath(sprintf('%s/manifest/%s', $idOrName, $path));

        return $this->put($path, ['manifest' => $manifest]);
    }

    /**
     * Updates a user role manifest by role ID or name.
     *
     * @param string $idOrName
     * @param string $path
     * @param array $manifest
     * @return array
     */
    public function updatePathManifest(string $idOrName, string $path, array $manifest) : array
    {
        $path = $this->getPath(sprintf('%s/manifest/%s', $idOrName, $path));

        return $this->post($path, ['json' => compact('manifest')]);
    }
}
