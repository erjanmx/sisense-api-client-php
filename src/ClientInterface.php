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
     * HTTP GETs $params to $path.
     *
     * @param  $path
     * @param  array $options
     * @return array
     */
    public function get(string $path, array $options = []) : array;

    /**
     * HTTP POSTs $data to $path.
     *
     * @param  $path
     * @param  $options
     * @return array
     */
    public function post(string $path, array $options = []) : array;

    /**
     * HTTP PUTs $data to $path.
     *
     * @param  $path
     * @param  $options
     * @return array
     */
    public function put(string $path, array $options = []) : array;

    /**
     * HTTP DELETEs $data to $path.
     *
     * @param string $path
     * @param mixed  $options
     *
     * @return array
     */
    public function delete(string $path, array $options = []) : array;

    /**
     * HTTP PATCHes $data to $path.
     *
     * @param string $path
     * @param mixed  $options
     *
     * @return array
     */
    public function patch(string $path, array $options = []) : array;
}
