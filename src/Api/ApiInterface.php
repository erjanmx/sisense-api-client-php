<?php


namespace Sisense\Api;

/**
 * Interface ApiInterface
 *
 * @package Sisense\Api
 */
interface ApiInterface
{
    /**
     * @param string $path
     * @param null $data
     * @return mixed
     */
    public function post(string $path, array $data = []);

    /**
     * @param  $path
     * @param  array $params
     * @return mixed
     */
    public function get(string $path, array $params = []);

    /**
     * @param  $path
     * @param  null $data
     * @return mixed
     */
    public function put(string $path, array $data = []);

    /**
     * @param  $path
     * @param  null $data
     * @return mixed
     */
    public function delete(string $path, array $data = []);
}
