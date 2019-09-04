<?php

namespace Sisense\Api;

use GuzzleHttp\Exception\GuzzleException;
use Sisense\Client;

/**
 * Class AbstractApi
 *
 * @package Sisense\Api
 */
class AbstractApi implements ApiInterface
{
    protected $apiGroup = '';

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
     * @param  $path
     * @param  null  $data
     * @param  array $headers
     * @return mixed
     * @throws GuzzleException
     */
    public function post($path, $data = null, array $headers = [])
    {
        return $this->client->post($path, $data);
    }

    /**
     * @param  $path
     * @param  array $params
     * @param  bool  $decode
     * @return mixed
     * @throws GuzzleException
     */
    public function get($path, array $params = [])
    {
        return $this->client->get($path, $params);
    }

    /**
     * @param  $path
     * @param  null $data
     * @return mixed
     */
    public function put($path, $data = null)
    {
        return $this->client->put($path, $data);
    }

    /**
     * @param  $path
     * @param  null $data
     * @return mixed
     */
    public function delete($path, $data = null)
    {
        return $this->client->delete($path, $data);
    }

    /**
     * @param  string $endPoint
     * @return string
     */
    protected function getPath(string $endPoint = '') : string
    {
        return sprintf('%s/%s', $this->apiGroup, $endPoint);
    }
}
