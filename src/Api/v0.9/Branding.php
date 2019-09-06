<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class Branding
 *
 * @package Sisense\Api\V09
 */
class Branding extends AbstractApi
{
    protected $resourcePath = 'branding';

    /**
     * Returns the current branding metadata.
     *
     * @return array
     */
    public function getAll() : array
    {
        $path = $this->getPath('');

        return $this->get($path);
    }

    /**
     * Adds new branding to your Sisense dashboards.
     *
     * @param array $parameters
     * @return array
     */
    public function addBranding(array $parameters) : array
    {
        $path = $this->getPath('');

        return $this->post($path, $parameters);
    }

    /**
     * Resets the current branding to the default Sisense branding.
     *
     * @param array $parameters
     * @return array
     */
    public function deleteBranding(array $parameters) : array
    {
        $path = $this->getPath('');

        return $this->delete($path, $parameters);
    }
}
