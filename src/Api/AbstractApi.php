<?php

namespace Sisense\Api;

use Sisense\Client;

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
     * @param $path
     * @param null $data
     * @param array $headers
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($path, $data = null, array $headers = [])
    {
        return $this->client->post($path, $data);
    }

    /**
     * @param $path
     * @param array $params
     * @param bool $decode
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($path, array $params = [])
    {
        return $this->client->get($path, $params);
    }

    /**
     * @param $path
     * @param null $data
     * @return mixed
     */
    public function put($path, $data = null)
    {
        // TODO: Implement put() method.
    }

    /**
     * @param $path
     * @param null $data
     * @return mixed
     */
    public function delete($path, $data = null)
    {
        // TODO: Implement delete() method.
    }

    /**
     *
     */
    protected function getPath(string $endPoint = '') : string
    {
        return sprintf('%s/%s', $this->apiGroup, $endPoint);
    }
}
