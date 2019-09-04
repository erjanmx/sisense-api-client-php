<?php

namespace Sisense;

use GuzzleHttp\Exception\GuzzleException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class Client
 *
 * @package Sisense
 *
 * @property-read Api\Authentication $authentication
 * @property-read Api\Users $users
 * @property-read Api\Groups $groups
 * @property-read Api\Application $application
 */
class Client implements ClientInterface
{
    use JsonEncodeDecoder;

    private $classes = [
        'users' => 'Users',
        'groups' => 'Groups',
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
     *
     * @param string                           $baseUrl
     * @param array                            $config
     * @param \GuzzleHttp\ClientInterface|null $http
     */
    public function __construct($baseUrl, array $config = [], \GuzzleHttp\ClientInterface $http = null)
    {
        if (is_null($http)) {
            $http = new \GuzzleHttp\Client();
        }

        $this->http = $http;
        $this->baseUrl = $baseUrl;

        $this->config = array_merge($this->config, $config);
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
     * @param  $path
     * @param  $method
     * @param  array  $options
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
     * @inheritDoc
     */
    public function get($path, array $params = []) : array
    {
        $options['query'] = $params;

        return $this->runRequest($path, 'GET', $options);
    }

    /**
     * @inheritDoc
     */
    public function post(string $path, array $data = []) : array
    {
        $options['form_params'] = $data;

        return $this->runRequest($path, 'POST', $options);
    }

    /**
     * @inheritDoc
     */
    public function put(string $path, array $data = []): array
    {
        // TODO: Implement put() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(string $path, array $data = []): array
    {
        // TODO: Implement delete() method.
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
     * Helper to authenticate
     *
     * @param  string $username
     * @param  string $password
     * @throws GuzzleException
     */
    public function authenticate(string $username = '', string $password = '')
    {
        if ($username) {
            $this->config['username'] = $username;
        }
        if ($password) {
            $this->config['password'] = $password;
        }

        if (empty($this->config['username']) || empty($this->config['password'])) {
            throw new InvalidArgumentException('Credentials not found');
        }

        $response = $this->authentication->login($this->config['username'], $this->config['password']);

        $this->setAccessToken($response['access_token']);
    }

    /**
     * @param  string $accessToken
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
