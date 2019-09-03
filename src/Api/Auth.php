<?php

namespace Sisense\Api;

class Auth extends AbstractApi
{
    protected $apiGroup = 'auth';

    /**
     * Indicates if current user is logged in.
     *
     * @return bool
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function isAuth()
    {
        $path = $this->getPath('isauth');

        $response = $this->get($path);

        return $response['isAuthenticated'] ?? false;
    }
}
