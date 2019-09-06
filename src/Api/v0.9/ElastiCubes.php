<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;
use Sisense\Exceptions\MethodNotImplemented;

/**
 * Class ElastiCubes
 *
 * @package Sisense\Api\V09
 */
class ElastiCubes extends AbstractApi
{
    protected $resourcePath = 'elasticubes';

    /**
     *  Returns a list of ElastiCubes with metadata.
     *  Metadata includes the ElastiCube name, ElastiCube ID, the server address (URL), and the database name.
     *
     * @param string $q A query that returns all ElastiCubes beginning with the value
     * @param string $sortBy The order in which the ElastiCubes appear in the response.
     * @return array
     */
    public function getAllMetaData(string $q = '', string $sortBy = '') : array
    {
        $path = $this->getPath('metadata');
        
        $params = [
            'q' => $q,
            'sortBy' => $sortBy,
        ];

        return $this->get($path, $params);
    }

    /**
     * Returns metadata for an ElastiCube by ElastiCube name.
     * Metadata includes the ElastiCube name, ElasticCube ID, server address, and database name.
     *
     * @param string $elastiCube The ElastiCube name as displayed in ElastiCube manager
     * @return array
     */
    public function getMetaData(string $elastiCube) : array
    {
        $path = $this->getPath(sprintf('%s/%s', 'metadata', $elastiCube));

        return $this->get($path);
    }

    /**
     * Returns fields included in a specific ElastiCube.
     *
     * @param string $elastiCube
     * @return array
     */
    public function getFields(string $elastiCube) : array
    {
        $path = $this->getPath(sprintf('elasticubes/metadata/%s/fields', $elastiCube));

        return $this->get($path);
    }

    /**
     * Executes an SQL statement to extract data from an ElastiCube.
     *
     * @param string $elastiCube
     * @param array $parameters [
     *     offset, count, format, query
     * ]
     * @return array
     */
    public function executeSql(string $elastiCube, array $parameters = []) : array
    {
        $path = $this->getPath(sprintf('elasticubes/%s/Sql', $elastiCube));

        return $this->get($path, $parameters);
    }

    /**
     * Returns ElastiCubes with their server and ElastiCube details.
     *
     * @return array
     * @throws MethodNotImplemented
     */
    public function getAll() : array
    {
        throw new MethodNotImplemented();
    }

    /**
     * Returns the ElastiCube servers with metadata.
     *
     * @return array
     * @throws MethodNotImplemented
     */
    public function getServers() : array
    {
        throw new MethodNotImplemented();
    }

    /**
     * Returns all the ElastiCubes by server.
     *
     * @return array
     * @throws MethodNotImplemented
     */
    public function getServer() : array
    {
        throw new MethodNotImplemented();
    }
}
