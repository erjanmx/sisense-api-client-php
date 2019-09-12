<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

/**
 * Class Settings
 *
 * @package Sisense\Api\V09
 */
class Settings extends AbstractApi
{
    protected $resourcePath = 'settings';

    /**
     * Returns API settings
     *
     * @return array
     */
    public function getApi() : array
    {
        $path = $this->getPath('api');

        return $this->get($path);
    }

    /**
     * Returns system configuration settings.
     *
     * @return array
     */
    public function getSystem() : array
    {
        $path = $this->getPath('system');

        return $this->get($path);
    }

    /**
     * Adds or updates system settings.
     *
     * @param array $parameters
     * @return array
     */
    public function setSystem(array $parameters) : array
    {
        $path = $this->getPath('system');

        return $this->post($path, $parameters);
    }

    /**
     * Returns proxy server settings in your server.
     *
     * @return array
     */
    public function getProxy() : array
    {
        $path = $this->getPath('proxy');

        return $this->get($path);
    }

    /**
     * Adds proxy server settings to your server.
     *
     * @param array $proxyConfig
     * @return array
     */
    public function addProxy(array $proxyConfig) : array
    {
        $path = $this->getPath('proxy');

        return $this->post($path, ['proxyConfig' => $proxyConfig]);
    }

    /**
     * Updates proxy server settings in your server.
     *
     * @param array $proxyConfig
     * @return array
     */
    public function updateProxy(array $proxyConfig) : array
    {
        $path = $this->getPath('proxy');

        return $this->put($path, ['proxyConfig' => $proxyConfig]);
    }

    /**
     * Deletes proxy server settings in your server.
     *
     * @param array $parameters
     * @return array
     */
    public function deleteProxy(array $parameters) : array
    {
        $path = $this->getPath('proxy');

        return $this->delete($path, $parameters);
    }

    /**
     * Returns security settings, including the API token.
     *
     * @return array
     */
    public function getSecurity() : array
    {
        $path = $this->getPath('security');

        return $this->get($path);
    }

    /**
     * Adds/updates security settings.
     *
     * @param array $securityConfig
     * @return array
     */
    public function setSecurity(array $securityConfig) : array
    {
        $path = $this->getPath('security');

        return $this->post($path, ['securityConfig' => $securityConfig]);
    }

    /**
     * Generates API settings
     *
     * @return array
     */
    public function generateApi() : array
    {
        $path = $this->getPath('api/generate');

        return $this->get($path);
    }

    /**
     * Returns locale settings, including the set locale, and whether autodetect is enabled.
     *
     * @return array
     */
    public function getGlobalization() : array
    {
        $path = $this->getPath('globalization');

        return $this->get($path);
    }

    /**
     * Adds/updates globalization settings.
     *
     * @param array $globalizationConfig
     * @return array
     */
    public function setGlobalization(array $globalizationConfig) : array
    {
        $path = $this->getPath('globalization');

        return $this->post($path, ['globalizationConfig' => $globalizationConfig]);
    }

    /**
     * Deletes API settings
     *
     * @param array $globalizationConfig
     * @return array
     */
    public function deleteApi(array $globalizationConfig) : array
    {
        $path = $this->getPath('api');

        return $this->delete($path);
    }
}
