<?php

namespace Sisense\Api;

/**
 * Class Users
 *
 * @package Sisense\Api
 */
class Users extends AbstractApi
{
    protected $apiGroup = 'users';

    /**
     * The get users endpoint returns a list of users with their details.
     * Results can be filtered by parameters such as username and email.
     * The expandable fields for the user object are groups, adgroups and role.
     *
     * @param  array $parameters Array containing the necessary params.
     * $parameters = [
     *      'email'     => (string) Email to filter by.
     *      'firstName' => (string) First name to filter by.
     *      'lastName'  => (string) Last name to filter by.
     *      'roleId'    => (string) Role ID to filter by.
     *      'groupId'   => (string) Group ID to filter by.
     *      'active'    => (bool)   User state to filter by - true for active users, false for inactive users.
     *      'origin'    => (string) User origin to filter by - ad for active directory or sisense.
     *      'ids'       => (array)  Array of user IDs to get, separated by a comma (,) and without spaces. ???
     *      'fields'    => (string) Whitelist of fields to return for each document.
     *                              Can also define which fields to exclude by prefixing field names with "-".
     *      'sort'      => (string) Field by which the results should be sorted.
     *                              Ascending by default, descending if prefixed by "-".
     *      'skip'      => (int)    Number of results to skip from the start of the data set.
     *                              To be used with the limit parameter for paging.
     *      'limit'     => (int)    How many results should be returned. To be used with the skip parameter for paging.
     *      'expand'    => (string) List of fields that should be expanded (substitutes their IDs with actual objects).
     *                              May be nested using the "resource.subResource" format.
     *  ]
     *
     * @return array
     */
    public function getAll(array $parameters = []) : array
    {
        return $this->get($this->getPath(), $parameters);
    }

    /**
     * Get a specific user.
     *
     * @param  int    $id
     * @param  string $fields
     * @param  string $expand
     * @return array
     */
    public function getUser(int $id, string $fields = '', string $expand = '') : array
    {
        $path = $this->getPath($id);

        $params = [
            'fields' => $fields,
            'expand' => $expand,
        ];

        return $this->get($path, $params);
    }

    /**
     * Adds a new user.
     *
     * @param  array $user Array containing the necessary params.
     *      $user = [
     *          'email'       => (string) Email.
     *          'userName'    => (string) Username.
     *          'firstName'   => (string) First name.
     *          'lastName'    => (string) Last name.
     *          'roleId'      => (string) Role ID.
     *          'groups'      => (array)
     *          'preferences' => (string)
     *          'password'    => (string) Password.
     *      ]
     * @return array
     */
    public function addUser(array $user) : array
    {
        return $this->post($this->getPath(), $user);
    }
}
