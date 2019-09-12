<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class Groups
 *
 * @package Sisense\Api\V09
 */
class Groups extends AbstractApi
{
    protected $resourcePath = 'groups';

    /**
     * Returns all user groups with metadata.
     *
     * @param array $parameters
     * @return array
     */
    public function getAll(array $parameters = []) : array
    {
        $path = $this->getPath();

        return $this->get($path, $parameters);
    }

    /**
     * Searches for groups directly in Active Directory.
     *
     * @param array $parameters
     * @return array
     */
    public function getAllAD(array $parameters = []) : array
    {
        $path = $this->getPath('ad');

        return $this->get($path, $parameters);
    }

    /**
     * Searches for groups in all directories.
     *
     * @param array $parameters
     * @return array
     */
    public function getAllDirectories(array $parameters = []) : array
    {
        $path = $this->getPath('allDirectories');

        return $this->get($path, $parameters);
    }

    /**
     * Returns metadata for a group by group ID or name.
     *
     * @param string $group The ID or username of the group
     * @return array
     */
    public function getGroup(string $group) : array
    {
        $path = $this->getPath($group);

        return $this->get($path);
    }

    /**
     * Returns a list of users in a group together with each user's metadata.
     *
     * @param string $group The ID or username of the group
     * @return array
     */
    public function getUsersInGroup(string $group) : array
    {
        $path = $this->getPath(sprintf('%s/users', $group));

        return $this->get($path);
    }

    /**
     * Returns a list of groups by user IDs.
     *
     * @param array $parameters
     * @return array
     */
    public function getGroupsByUser(array $parameters) : array
    {
        $path = $this->getPath('byIds');

        return $this->post($path, $parameters);
    }

    /**
     * Adds a new Sisense user group.
     *
     * @param array $parameters
     * @return array
     */
    public function addGroup(array $parameters) : array
    {
        $path = $this->getPath();

        return $this->post($path, $parameters);
    }

    /**
     * Adds a new Active Directory user group.
     *
     * @param array $parameters
     * @return array
     */
    public function addADGroup(array $parameters) : array
    {
        $path = $this->getPath('ad');

        return $this->post($path, $parameters);
    }

    /**
     * Adds users to a Sisense user group.
     *
     * @param string $group
     * @param array $parameters
     * @return array
     */
    public function addUsersToGroup(string $group, array $parameters) : array
    {
        $path = $this->getPath(sprintf('%s/users', $group));

        return $this->post($path, $parameters);
    }

    /**
     * Checks if the group exists.
     *
     * @param array $parameters
     * @return array
     */
    public function validateName(array $parameters) : array
    {
        $path = $this->getPath('validateName');

        return $this->post($path, $parameters);
    }

    /**
     * Updates the Name and Role in Active Directory for a group according to the group ID or name.
     *
     * @param string $group The group's ID or name.
     * @param array $parameters
     * @return array
     */
    public function updateGroup(string $group, array $parameters = []) : array
    {
        $path = $this->getPath($group);

        return $this->put($path, $parameters);
    }

    /**
     * Deletes multiple groups by group name or ID.
     *
     * @param array $parameters
     * @return array
     */
    public function deleteGroups(array $parameters = []) : array
    {
        $path = $this->getPath();

        return $this->delete($path, $parameters);
    }

    /**
     * Deletes a group by group ID or name.
     *
     * @param string $group
     * @param bool $deleteAuthors Select true if you want to delete the users of the Active Directory group.
     * @return array
     */
    public function deleteGroup(string $group, bool $deleteAuthors = false) : array
    {
        $path = $this->getPath($group);

        return $this->delete($path, ['deleteauthors' => $deleteAuthors]);
    }

    /**
     * Removes users from a user group.
     *
     * @param string $group
     * @param array $parameters
     * @return array
     */
    public function deleteUsers(string $group, array $parameters) : array
    {
        $path = $this->getPath(sprintf('%s/users', $group));

        return $this->delete($path, $parameters);
    }
}
