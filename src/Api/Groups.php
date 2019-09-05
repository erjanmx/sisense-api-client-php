<?php

namespace Sisense\Api;

/**
 * Class Groups
 *
 * @package Sisense\Api
 */
class Groups extends AbstractApi
{
    protected $resourcePath = 'v1/groups';

    /**
     * Get groups
     *
     * The get groups endpoint returns a list of user groups with their details.
     * The results can be filtered by different parameters such as group name or origin.
     * The expandable fields for the group object are users and role.
     *
     * @param  array $parameters Array containing the necessary params.
     * $parameters = [
     *      'name'     => (string) Group name to filter by.
     *      'mail'     => (string) Group email to filter by.
     *      'roleId'   => (string) Group role ID to filter by.
     *      'origin'   => (string) Group origin to filter by (ad or sisense).
     *      'ids'      => (array)  Group IDs to filter by, separated by a comma (,) and without spaces.
     *      'fields'   => (bool)   Whitelist of fields to return for each document.
     *                             Can also define which fields to exclude by prefixing field names with "-"
     *      'sort'     => (string) Field by which the results should be sorted.
     *                             Ascending by default, descending if prefixed by "-".
     *      'skip'     => (int)    Number of results to skip from the start of the data set.
     *                             To be used with the limit parameter for paging.
     *      'limit'    => (int)    How many results should be returned. To be used with the skip parameter for paging.
     *      'expand'   => (string) List of fields that should be expanded (substitutes their IDs with actual objects).
     *                             May be nested using the "resource.subResource" format.
     *  ]
     *
     * @return array
     */
    public function getAll(array $parameters = []) : array
    {
        return $this->get($this->getPath(), $parameters);
    }

    /**
     * Get a specific group
     *
     * @param  int    $id
     * @param  string $fields
     * @param  string $expand
     * @return array
     */
    public function getGroup(int $id, string $fields = '', string $expand = '') : array
    {
        $path = $this->getPath($id);

        $params = [
            'fields' => $fields,
            'expand' => $expand,
        ];

        return $this->get($path, $params);
    }

    /**
     * Add a new group.
     *
     * @param array $group Array containing the necessary params.
     *      $group = [
     *          'name' => (string)
     *          'mail' => (string)
     *      ]
     * @return array
     */
    public function addGroup(array $group) : array
    {
        return $this->post($this->getPath(), $group);
    }
}
