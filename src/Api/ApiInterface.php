<?php


namespace Sisense\Api;


interface ApiInterface
{
    /**
     * @param $path
     * @param null $data
     * @param array $headers
     * @return mixed
     */
    public function post($path, $data = null, array $headers = []);

    /**
     * @param $path
     * @param array $params
     * @return mixed
     */
    public function get($path, array $params = []);

    /**
     * @param $path
     * @param null $data
     * @return mixed
     */
    public function put($path, $data = null);

    /**
     * @param $path
     * @param null $data
     * @return mixed
     */
    public function delete($path, $data = null);
}