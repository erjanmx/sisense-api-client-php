<?php

namespace Sisense\Api;

/**
 * Class Application
 *
 * @package Sisense\Api
 */
class Application extends AbstractApi
{
    protected $apiGroup = 'application';

    /**
     * Get the application's status.
     *
     * The application status endpoint provides information on the current status of the Sisense application.
     * It provides the version number and some licensing information.
     *
     * @return array
     */
    public function status() : array
    {
        return $this->get($this->getPath('status'));
    }
}
