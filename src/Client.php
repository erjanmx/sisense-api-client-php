<?php

namespace Sisense;

use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Client
 * @package Sisense
 *
 * @property-read Api\Authentication $authentication
 * @property-read Api\Users $users
 * @property-read Api\Application $application
 */
class Client implements ClientInterface
{
    use JsonEncodeDecoder;

    private $classes = [
        'users' => 'Users',
        'application' => 'Application',
        'authentication' => 'Authentication',
    ];

    /**
     * @var \GuzzleHttp\ClientInterface $http
     */
    private $http;

    /**
     * @var string
     */
    private $baseUrl;

    /**
     * @var string
     */
    private $accessToken = null;

    /**
     * @var array APIs
     */
    private $apis = [];

    /**
     * @var array
     */
    private $config = [];

    /**
     * Client constructor.
     * @param string $baseUrl
     * @param \GuzzleHttp\ClientInterface|null $http
     */
    public function __construct($baseUrl, \GuzzleHttp\ClientInterface $http = null)
    {
        if (is_null($http)) {
            $http = new \GuzzleHttp\Client();
        }

        $this->http = $http;
        $this->baseUrl = $baseUrl;
    }

    /**
     * @param string $name
     *
     * @return Api\AbstractApi
     * @throws \InvalidArgumentException
     */
    public function __get($name)
    {
        return $this->api($name);
    }

    /**
     * @param $path
     * @param $method
     * @param array $options
     * @return array
     * @throws GuzzleException
     */
    public function runRequest($path, $method, $options = [])
    {
        if ($this->accessToken && empty($options['headers'])) {
            $options['headers'] = [
                'Authorization' => 'Bearer ' . $this->accessToken,
            ];
        }

        $response = $this->http->request($method, $this->baseUrl . $path, $options);

        return $this->decode(
            $response->getBody()->getContents()
        );
    }

    /**
     * @param $path
     * @param array $params
     * @return array|string
     * @throws GuzzleException
     */
    public function get($path, array $params = [])
    {
        $options['query'] = $params;

        return $this->runRequest($path, 'GET', $options);
    }

    /**
     * HTTP POSTs $params to $path.
     *
     * @param string $path
     * @param mixed $data
     * @return array
     * @throws GuzzleException
     */
    public function post($path, $data)
    {
        $options['form_params'] = $data;

        return $this->runRequest($path, 'POST', $options);
    }

    /**
     * @param string $name
     *
     * @throws \InvalidArgumentException
     *
     * @return Api\AbstractApi
     */
    public function api($name)
    {
        if (!isset($this->classes[$name])) {
            throw new \InvalidArgumentException('Available api : '.implode(', ', array_keys($this->classes)));
        }

        if (isset($this->apis[$name])) {
            return $this->apis[$name];
        }

        $c = 'Sisense\Api\\' . $this->classes[$name];
        $this->apis[$name] = new $c($this);
        return $this->apis[$name];
    }

    /**
     * @param string $accessToken
     * @return $this
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @return string
     */
    public function getBaseUrl() : string
    {
        return $this->baseUrl;
    }

    /**
     * @return \GuzzleHttp\ClientInterface
     */
    public function getHttp() : \GuzzleHttp\ClientInterface
    {
        return $this->http;
    }
}
