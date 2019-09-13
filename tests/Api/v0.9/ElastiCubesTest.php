<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class ElastiCubesTest
 */
class ElastiCubesTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServers()
     */
    public function testGetServers()
    {
        $this->expects('elasticubes/servers', 'GET', ['query' => ['q' => 'q']]);

        $this->clientMock->elastiCubes->getServers(['q' => 'q']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getElasticubesMetadata()
     */
    public function testGetElasticubesMetadata()
    {
        $this->expects('elasticubes/metadata', 'GET', ['query' => ['q' => 'q', 'sortBy' => 'field']]);

        $this->clientMock->elastiCubes->getElasticubesMetadata('q', 'field');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getElasticubeSql()
     */
    public function testGetElasticubeSql()
    {
        $this->expects('elasticubes/cube/Sql', 'GET', ['query' => []]);

        $this->clientMock->elastiCubes->getElasticubeSql('cube');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServerElastiCubes()
     */
    public function testGetServerElastiCubes()
    {
        $this->expects('elasticubes/server/addr', 'GET', ['query' => ['foo']]);

        $this->clientMock->elastiCubes->getServerElastiCubes('addr', ['foo']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getElasticubeMetadata()
     */
    public function testGetElasticubeMetadata()
    {
        $this->expects('elasticubes/metadata/cube', 'GET');

        $this->clientMock->elastiCubes->getElasticubeMetadata('cube');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getElasticubeFields()
     */
    public function testGetElasticubeFields()
    {
        $this->expects('elasticubes/metadata/cube/fields', 'GET', ['query' => []]);

        $this->clientMock->elastiCubes->getElasticubeFields('cube');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getAll()
     */
    public function testGetAll()
    {
        $this->expects('elasticubes/', 'GET', ['query' => []]);

        $this->clientMock->elastiCubes->getAll();
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServer()
     */
    public function testGetServer()
    {
        $this->expects('elasticubes/servers/serverName', 'GET', ['query' => []]);

        $this->clientMock->elastiCubes->getServer('serverName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServerSimple()
     */
    public function testGetServerSimple()
    {
        $this->expects('elasticubes/servers/serverName/simple', 'GET', ['query' => []]);

        $this->clientMock->elastiCubes->getServerSimple('serverName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServerStatus()
     */
    public function testGetServerStatus()
    {
        $this->expects('elasticubes/servers/serverName/status', 'GET', ['query' => []]);

        $this->clientMock->elastiCubes->getServerStatus('serverName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getDataSecurityRules()
     */
    public function testGetDataSecurityRules()
    {
        $this->expects('elasticubes/serverName/cubeName/datasecurity', 'GET');

        $this->clientMock->elastiCubes->getDataSecurityRules('serverName', 'cubeName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getUserDataSecurity()
     */
    public function testGetUserDataSecurity()
    {
        $this->expects('elasticubes/serverName/cubeName/userName/datasecurity', 'GET');

        $this->clientMock->elastiCubes->getUserDataSecurity('serverName', 'cubeName', 'userName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getColumnDataSecurity()
     */
    public function testGetColumnDataSecurity()
    {
        $this->expects('elasticubes/s/c/datasecurity/t/c', 'GET');

        $this->clientMock->elastiCubes->getColumnDataSecurity('s', 'c', 't', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getAuthRecords()
     */
    public function testGetAuthRecords()
    {
        $this->expects('elasticubes/s/c/permissions', 'GET');

        $this->clientMock->elastiCubes->getAuthRecords('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::startServer()
     */
    public function testStartServer()
    {
        $this->expects('elasticubes/s/c/start', 'POST');

        $this->clientMock->elastiCubes->startServer('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::stopServer()
     */
    public function testStopServer()
    {
        $this->expects('elasticubes/s/c/stop', 'POST');

        $this->clientMock->elastiCubes->stopServer('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::restartServer()
     */
    public function testRestartServer()
    {
        $this->expects('elasticubes/s/c/restart', 'POST');

        $this->clientMock->elastiCubes->restartServer('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::startBuild()
     */
    public function testStartBuild()
    {
        $this->expects('elasticubes/s/c/startBuild', 'POST', ['query' => [
                'type' => 't',
                'orchestratorTask' => '',
            ]]);

        $this->clientMock->elastiCubes->startBuild('s', 'c', 't');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::stopBuild()
     */
    public function testStopBuild()
    {
        $this->expects('elasticubes/s/c/stopBuild', 'POST');

        $this->clientMock->elastiCubes->stopBuild('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::executeJAQL()
     */
    public function testExecuteJAQL()
    {
        $this->expects('elasticubes/c/jaql', 'POST', ['json' => ['Jaql' => 'jaql']]);

        $this->clientMock->elastiCubes->executeJAQL('c', 'jaql');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::defineDataSecurity()
     */
    public function testDefineDataSecurity()
    {
        $this->expects('elasticubes/s/c/datasecurity', 'POST', ['json' => [1]]);

        $this->clientMock->elastiCubes->defineDataSecurity('s', 'c', [1]);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::addDataSecurity()
     */
    public function testAddDataSecurity()
    {
        $this->expects('elasticubes/datasecurity', 'POST', ['json' => ['parameters']]);

        $this->clientMock->elastiCubes->addDataSecurity(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::attachDetachFolder()
     */
    public function testAttachDetachFolder()
    {
        $this->expects('elasticubes/s/c/attachDetach', 'POST', ['json' => ['body']]);

        $this->clientMock->elastiCubes->attachDetachFolder('s', 'c', ['body']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::updateDataSecurity()
     */
    public function testUpdateDataSecurity()
    {
        $this->expects('elasticubes/datasecurity/s', 'POST', ['json' => ['elasticubeUpdateDataSecurity' => ['body']]]);

        $this->clientMock->elastiCubes->updateDataSecurity('s', ['body']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::addElasticubePermissions()
     */
    public function testAddElasticubePermissions()
    {
        $this->expects('elasticubes/s/c/permissions', 'POST', ['json' => ['shares' => ['s']]]);

        $this->clientMock->elastiCubes->addElasticubePermissions('s', 'c', ['s']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::updateServerDefaultPermissions()
     */
    public function testUpdateServerDefaultPermissions()
    {
        $this->expects('elasticubes/server/s/permissions', 'PUT', ['json' => ['s']]);

        $this->clientMock->elastiCubes->updateServerDefaultPermissions('s', ['s']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::updateServerPermissions()
     */
    public function testUpdateServerPermissions()
    {
        $this->expects('elasticubes/servers/s/permissions', 'PUT', ['json' => ['s']]);

        $this->clientMock->elastiCubes->updateServerPermissions('s', ['s']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::updatePermissions()
     */
    public function testUpdatePermissions()
    {
        $this->expects('elasticubes/s/c/permissions', 'PUT', ['json' => ['shares']]);

        $this->clientMock->elastiCubes->updatePermissions('s', 'c', ['shares']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::deleteDataContext()
     */
    public function testDeleteDataContext()
    {
        $this->expects('elasticubes/s/c/datasecurity/t/c', 'DELETE', []);

        $this->clientMock->elastiCubes->deleteDataContext('s', 'c', 't', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::deleteAllPermissions()
     */
    public function testDeleteAllPermissions()
    {
        $this->expects('elasticubes/s/c/datasecurity/t/c', 'DELETE', []);

        $this->clientMock->elastiCubes->deleteAllPermissions('s', 'c', 't', 'c');
    }
}
