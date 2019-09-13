<?php

namespace Sisense\Api;

use Sisense\Client;

/**
 * Class AbstractApi
 *
 * @package Sisense\Api
 */
abstract class AbstractApi
{
    protected $resourcePath;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $path
     * @param array $options
     * @return array
     */
    public function post(string $path, array $options = []) : array
    {
        return $this->client->post($path, $options);
    }

    /**
     * @param string $path
     * @param array $options
     * @return array
     */
    public function get(string $path, array $options = []) : array
    {
        return $this->client->get($path, $options);
    }

    /**
     * @param string $path
     * @param array $options
     * @return array
     */
    public function put(string $path, array $options = []) : array
    {
        return $this->client->put($path, $options);
    }

    /**
     * @param string $path
     * @param array $options
     * @return array
     */
    public function delete(string $path, array $options = []) : array
    {
        return $this->client->delete($path, $options);
    }

    /**
     * @param string $path
     * @param array $options
     * @return array
     */
    public function patch(string $path, array $options = []) : array
    {
        return $this->client->patch($path, $options);
    }

    /**
     * @param  string $endPoint
     * @return string
     */
    protected function getPath(string $endPoint = '') : string
    {
        return sprintf('%s/%s', $this->resourcePath, $endPoint);
    }
}
