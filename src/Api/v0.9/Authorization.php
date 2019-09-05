<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class Authorization
 *
 * @package Sisense\Api\V09
 */
class Authorization extends AbstractApi
{
    protected $resourcePath = 'auth';

    /**
     * Indicates if current user is logged in.
     *
     * @return array
     */
    public function isAuth() : array
    {
        $path = $this->getPath('isauth');

        return $this->get($path);
    }

    /**
     * Logs the user out of Sisense.
     *
     * @return array
     */
    public function logout() : array
    {
        $path = $this->getPath('logout');

        return $this->get($path);
    }
}
