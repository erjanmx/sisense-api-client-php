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

        $options = [
            'form_params' => [
                'username' => $username,
                'password' => $password,
            ],
        ];

        return $this->post($path, $options);
    }

    /**
     * The logout endpoint revokes the given user's token, ensuring requests made with it will no longer work.
     * A new token may be generated using the login endpoint.
     *
     * @param string $targetDevice
     * @return array
     */
    public function logout(string $targetDevice = '') : array
    {
        $path = $this->getPath('logout');

        return $this->get($path, ['query' => compact('targetDevice')]);
    }
}
