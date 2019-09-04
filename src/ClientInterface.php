<?php

namespace Sisense;

use InvalidArgumentException;

/**
 * Interface ClientInterface
 *
 * @package Sisense
 */
interface ClientInterface
{
    /**
     * @param string $name
     *
     * @throws InvalidArgumentException
     *
     * @return Api\AbstractApi
     */
    public function api(string $name);

    /**
     * HTTP GETs $params to $path.
     *
     * @param  $path
     * @param  array $params
     * @return array
     */
    public function get(string $path, array $params = []) : array;

    /**
     * HTTP POSTs $data to $path.
     *
     * @param  $path
     * @param  $data
     * @return array
     */
    public function post(string $path, array $data = []) : array;

    /**
     * HTTP PUTs $data to $path.
     *
     * @param  $path
     * @param  $data
     * @return array
     */
    public function put(string $path, array $data = []) : array;

    /**
     * HTTP DELETEs $data to $path.
     *
     * @param string $path
     * @param mixed  $data
     *
     * @return array
     */
    public function delete(string $path, array $data = []) : array;
}
