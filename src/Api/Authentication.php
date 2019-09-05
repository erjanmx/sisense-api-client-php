<?php

namespace Sisense\Api;

/**
 * Class Authentication
 *
 * @package Sisense\Api
 */
class Authentication extends AbstractApi
{
    protected $resourcePath = 'v1/authentication';

    /**
     * The login endpoint validates passed credentials and returns an API token for subsequent requests to the API.
     *
     * @param  $username
     * @param  $password
     * @return array
     */
    public function login($username, $password) : array
    {
        $path = $this->getPath('login');

        $data = [
            'username' => $username,
            'password' => $password,
        ];

        return $this->post($path, $data);
    }

    /**
     * The logout endpoint revokes the given user's token, ensuring requests made with it will no longer work.
     * A new token may be generated using the login endpoint.
     *
     * @param  string $collection Collection name to be returned.
     * @return array
     */
    public function logout(string $collection = '') : array
    {
        $params = [
            'collection' => $collection
        ];

        $path = $this->getPath('logout');

        return $this->get($path, $params);
    }
}
