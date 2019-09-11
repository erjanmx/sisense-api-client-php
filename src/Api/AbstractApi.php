<?php

namespace Sisense\Api;

use Sisense\Client;

/**
 * Class AbstractApi
 *
 * @package Sisense\Api
 */
class AbstractApi implements ApiInterface
{
    protected $resourcePath = '';

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
     * @inheritDoc
     */
    public function post(string $path, array $data = [])
    {
        return $this->client->post($path, $data);
    }

    /**
     * @inheritDoc
     */
    public function get(string $path, array $params = [])
    {
        return $this->client->get($path, $params);
    }

    /**
     * @inheritDoc
     */
    public function put(string $path, array $data = [])
    {
        return $this->client->put($path, $data);
    }

    /**
     * @inheritDoc
     */
    public function delete(string $path, array $data = [])
    {
        return $this->client->delete($path, $data);
    }

    /**
     * @inheritDoc
     */
    public function patch(string $path, array $data = [])
    {
        return $this->client->patch($path, $data);
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
