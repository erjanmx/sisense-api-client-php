<?php

namespace Sisense;

use Sisense\Exceptions\SisenseClientException as SisenseClientExceptionAlias;

/**
 * Class Client
 * @package Sisense
 *
 * @property-read Api\Auth $auth
 */
class Client implements ClientInterface
{
    use JsonEncodeDecoder;

    private $classes = [
        'auth' => 'Auth',
    ];

    /**
     * @var \GuzzleHttp\ClientInterface $http
     */
    private $http;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $apiToken = null;

    /**
     * @var array APIs
     */
    private $apis = [];

    /**
     * Client constructor.
     * @param string $url
     * @param \GuzzleHttp\ClientInterface|null $http
     */
    public function __construct($url, \GuzzleHttp\ClientInterface $http = null)
    {
        if (is_null($http)) {
            $http = new \GuzzleHttp\Client();
        }

        $this->url = $url;
        $this->http = $http;
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function runRequest($path, $method, $options = [])
    {
        if ($this->apiToken) {
            $options['headers'] = [
                'Authorization' => 'Bearer ' . $this->apiToken,
            ];
        }

        $response = $this->http->request($method, $this->url . $path, $options);

        return $this->decode(
            $response->getBody()->getContents()
        );
    }

    /**
     * @param $path
     * @param array $params
     * @return array|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($path, array $params = [])
    {
        $response = $this->runRequest($path, 'GET');

        return $response;
    }

    /**
     * HTTP POSTs $params to $path.
     *
     * @param string $path
     * @param mixed $data
     * @param array $headers
     *
     * @return bool|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($path, $data)
    {
        $options['form_params'] = $data;

//        var_dump($data);
        return $this->runRequest($path, 'POST', $options);
    }

    /**
     * @param $username
     * @param string $password
     *
     * @return string
     * @throws SisenseClientExceptionAlias
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login($username, $password)
    {
        $options = [
            'form_params' => [
                'username' => $username,
                'password' => $password,
            ],
        ];

        $response = $this->runRequest('v1/authentication/login', 'POST', $options);

        if (empty($response['access_token'])) {
            throw new SisenseClientExceptionAlias('Unable to authenticate');
        }

        $this->apiToken = $response['access_token'];

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
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

}
