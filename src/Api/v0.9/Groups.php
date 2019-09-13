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

        $options['query'] = $parameters;

        return $this->get($path, $options);
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

        return $this->get($path, ['query' => $parameters]);
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

        return $this->get($path, ['query' => $parameters]);
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
     * Returns a list of groups by groups IDs.
     *
     * @param array $idsList List of groups Ids
     * @param bool $usersCount Returns the number of users per group.
     * @param bool $includeDomain Returns the domain details of each AD group.
     * @return array
     */
    public function getAllByIds(array $idsList = [], bool $usersCount = false, bool $includeDomain = false) : array
    {
        $path = $this->getPath('byIds');

        return $this->post($path, [
            'json' => $idsList,
            'query' => compact('usersCount', 'includeDomain'),
        ]);
    }

    /**
     * Adds a new Sisense user group.
     *
     * @param array $newGroups
     * @return array
     */
    public function addGroup(array $newGroups = []) : array
    {
        $path = $this->getPath();

        return $this->post($path, ['json' => $newGroups]);
    }

    /**
     * Adds a new Active Directory user group.
     *
     * @param array $newGroups
     * @return array
     */
    public function addADGroup(array $newGroups = []) : array
    {
        $path = $this->getPath('ad');

        return $this->post($path, ['json' => $newGroups]);
    }

    /**
     * Adds users to a Sisense user group.
     *
     * @param string $group
     * @param array $usersArray
     * @return array
     */
    public function addUsersToGroup(string $group, array $usersArray = []) : array
    {
        $path = $this->getPath(sprintf('%s/users', $group));

        return $this->post($path, ['json' => $usersArray]);
    }

    /**
     * Checks if the group exists.
     *
     * @param array $group
     * @return array
     */
    public function validateName(array $group = []) : array
    {
        $path = $this->getPath('validateName');

        return $this->post($path, ['json' => $group]);
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

        return $this->put($path, ['json' => $parameters]);
    }

    /**
     * Deletes multiple groups by group name or ID.
     *
     * @param array $deleteGroup
     * @return array
     */
    public function deleteGroups(array $deleteGroup = []) : array
    {
        $path = $this->getPath();

        return $this->delete($path, ['json' => $deleteGroup]);
    }

    /**
     * Deletes a group by group ID or name.
     *
     * @param string $group
     * @param bool $deleteAdUsers Select true if you want to delete the users of the Active Directory group.
     * @return array
     */
    public function deleteGroup(string $group, bool $deleteAdUsers = false) : array
    {
        $path = $this->getPath($group);

        return $this->delete($path, ['json' => compact('deleteAdUsers')]);
    }

    /**
     * Removes users from a user group.
     *
     * @param string $group
     * @param array $usersArray
     * @return array
     */
    public function deleteUsers(string $group, array $usersArray = []) : array
    {
        $path = $this->getPath(sprintf('%s/users', $group));

        return $this->delete($path, ['json' => $usersArray]);
    }
}
