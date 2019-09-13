<?php

namespace Sisense\Api\V09;

use Sisense\Api\AbstractApi;

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
    public function getElasticubesMetadata(string $q = '', string $sortBy = '') : array
    {
        $path = $this->getPath('metadata');

        return $this->get($path, ['query' => [
            'q' => $q,
            'sortBy' => $sortBy,
        ]]);
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
     * @param array $parameters
     * @return array
     */
    public function getAll(array $parameters = []) : array
    {
        return $this->get($this->getPath(), ['query' => $parameters]);
    }

    /**
     * Get Elasticubes Servers
     *
     * @param array $parameters
     * @return array
     */
    public function getServers(array $parameters = []) : array
    {
        $path = $this->getPath('servers');

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Returns all the ElastiCubes by server.
     *
     * @param string $server
     * @param array $parameters
     * @return array
     */
    public function getServer(string $server, array $parameters = []) : array
    {
        $path = $this->getPath(sprintf('%s/%s', 'servers', $server));

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Returns ElastiCube metadata by entering the server name/address/IP and database name.
     *
     * @param string $server
     * @param array $parameters
     * @return array
     */
    public function getServerSimple(string $server, array $parameters = []) : array
    {
        $path = $this->getPath(sprintf('%s/%s/simple', 'servers', $server));

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Returns the status of each ElastiCube in the selected server.
     *
     * @param string $server
     * @param array $parameters
     * @return array
     */
    public function getServerStatus(string $server, array $parameters = []) : array
    {
        $path = $this->getPath(sprintf('%s/%s/status', 'servers', $server));

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Returns the data security rules set up for the ElastiCube.
     *
     * @param string $server
     * @param string $elasticCube
     * @param array $parameters
     * @return array
     */
    public function getDataSecurityRules(string $server, string $elasticCube, array $parameters = []) : array
    {
        $path = $this->getPath(sprintf('%s/%s/datasecurity', $server, $elasticCube));

        return $this->get($path, ['query' => $parameters]);
    }

    /**
     * Returns data security for a specific user in a specific ElastiCube.
     *
     * @param string $server
     * @param string $cube
     * @param string $user
     * @return array
     */
    public function getUserDataSecurity(string $server, string $cube, string $user) : array
    {
        $path = $this->getPath(sprintf('%s/%s/%s/datasecurity', $server, $cube, $user));

        return $this->get($path);
    }

    /**
     * Returns ElastiCube data security for a column in a table in the ElastiCube.
     *
     * @param string $server
     * @param string $elastiCube
     * @param string $table
     * @param string $column
     * @return array
     */
    public function getColumnDataSecurity(string $server, string $elastiCube, string $table, string $column) : array
    {
        $path = $this->getPath(sprintf('%s/%s/datasecurity/%s/%s', $server, $elastiCube, $table, $column));

        return $this->get($path);
    }

    /**
     * Returns all authentication records for the given ElastiCube.
     *
     * @param string $server
     * @param string $elastiCube
     * @return array
     */
    public function getAuthRecords(string $server, string $elastiCube) : array
    {
        $path = $this->getPath(sprintf('%s/%s/permissions', $server, $elastiCube));

        return $this->get($path);
    }

    /**
     * Starts the ElastiCube Server.
     *
     * @param string $server
     * @param string $elastiCube
     * @return array
     */
    public function startServer(string $server, string $elastiCube) : array
    {
        $path = $this->getPath(sprintf('%s/%s/start', $server, $elastiCube));

        return $this->post($path);
    }

    /**
     * Stops the ElastiCube Server.
     *
     * @param string $server
     * @param string $elastiCube
     * @return array
     */
    public function stopServer(string $server, string $elastiCube) : array
    {
        $path = $this->getPath(sprintf('%s/%s/stop', $server, $elastiCube));

        return $this->post($path);
    }

    /**
     * Restarts the ElastiCube server.
     *
     * @param string $server
     * @param string $elastiCube
     * @return array
     */
    public function restartServer(string $server, string $elastiCube) : array
    {
        $path = $this->getPath(sprintf('%s/%s/restart', $server, $elastiCube));

        return $this->post($path);
    }

    /**
     * Starts the build process for an ElastiCube.
     *
     * @param string $address
     * @param string $cubeId
     * @param string $type
     * @return array
     */
    public function startBuild(string $address, string $cubeId, string $type, string $orchestratorTask = '') : array
    {
        $path = $this->getPath(sprintf('%s/%s/startBuild', $address, $cubeId));

        return $this->post($path, ['query' => [
            'type' => $type,
            'orchestratorTask' => $orchestratorTask,
        ]]);
    }

    /**
     * Stops the build process for an ElastiCube.
     *
     * @param string $server
     * @param string $elastiCube
     * @return array
     */
    public function stopBuild(string $server, string $elastiCube) : array
    {
        $path = $this->getPath(sprintf('%s/%s/stopBuild', $server, $elastiCube));

        return $this->post($path);
    }

    /**
     * Executes a JAQL query on the ElastiCube.
     *
     * @param string $jaql
     * @param string $elastiCube
     * @return array
     */
    public function executeJAQL(string $elastiCube, string $jaql) : array
    {
        $path = $this->getPath(sprintf('%s/jaql', $elastiCube));

        return $this->post($path, ['json' => ['Jaql' => $jaql]]);
    }

    /**
     * Add new data context for datasource
     *
     * @param string $server
     * @param string $elastiCube
     * @param array $dataSecurityList
     * @return array
     */
    public function defineDataSecurity(string $server, string $elastiCube, array $dataSecurityList = []) : array
    {
        $path = $this->getPath(sprintf('%s/%s/datasecurity', $server, $elastiCube));

        return $this->post($path, ['json' => $dataSecurityList]);
    }

    /**
     * Adds new data security for ElastiCube.
     *
     * @param array $elasticubeNewDataSecurityItems
     * @return array
     */
    public function addDataSecurity(array $elasticubeNewDataSecurityItems = []) : array
    {
        $path = $this->getPath('datasecurity');

        return $this->post($path, ['json' => $elasticubeNewDataSecurityItems]);
    }

    /**
     * AttachDetach cube
     *
     * @param string $address
     * @param string $cubeId
     * @param array $attachDetachObj
     * @return array
     */
    public function attachDetachFolder(string $address, string $cubeId, array $attachDetachObj) : array
    {
        $path = $this->getPath(sprintf('%s/%s/attachDetach', $address, $cubeId));


        return $this->post($path, ['json' => $attachDetachObj]);
    }

    /**
     * Defines a new permission for the given ElastiCube.
     *
     * @param string $server
     * @param string $elastiCube
     * @param array $elasticubeNewDataSecurityItemCubeGivens
     * @return array
     */
    public function definePermission(
        string $server,
        string $elastiCube,
        array $elasticubeNewDataSecurityItemCubeGivens = []
    ) : array {
        $path = $this->getPath(sprintf('%s/%s/permissions', $server, $elastiCube));

        return $this->post($path, ['json' => $elasticubeNewDataSecurityItemCubeGivens]);
    }

    /**
     * Updates the permissions (ACLs) for the current ElastiCube.
     *
     * @param string $server
     * @param string $elastiCube
     * @param array $shares
     * @return array
     */
    public function updatePermissions(string $server, string $elastiCube, array $shares = []) : array
    {
        $path = $this->getPath(sprintf('%s/%s/permissions', $server, $elastiCube));

        return $this->put($path, ['json' => $shares]);
    }

    /**
     * Deletes data context from a column in an ElastiCube table.
     *
     * @param string $server
     * @param string $elastiCube
     * @param string $table
     * @param string $column
     * @return array
     */
    public function deleteDataContext(string $server, string $elastiCube, string $table, string $column) : array
    {
        $path = $this->getPath(sprintf('%s/%s/datasecurity/%s/%s', $server, $elastiCube, $table, $column));

        return $this->delete($path);
    }

    /**
     * Deletes all permissions for the ElastiCube.
     *
     * @param string $server
     * @param string $elastiCube
     * @param string $table
     * @param string $column
     * @return array
     */
    public function deleteAllPermissions(string $server, string $elastiCube, string $table, string $column) : array
    {
        $path = $this->getPath(sprintf('%s/%s/datasecurity/%s/%s', $server, $elastiCube, $table, $column));

        return $this->delete($path);
    }
}
