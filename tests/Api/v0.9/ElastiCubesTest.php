<?php

namespace Sisense\Tests\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class ElastiCubesTest
 */
class ElastiCubesTest extends TestCase
{
    /**
     * @var MockObject|Client
     */
    protected $clientMock;


    public function setUp()
    {
        parent::setUp();

        $this->clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getAllMetaData()
     */
    public function testGetAllMetaData()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/metadata', 'GET', ['query' => ['q' => 'q', 'sortBy' => 'field']])
            ->willReturn([]);

        $q = 'q';
        $sortBy = 'field';

        $this->clientMock->elastiCubes->getAllMetaData($q, $sortBy);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getMetaData()
     */
    public function testGetMetaData()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/metadata/cube', 'GET', ['query' => []])
            ->willReturn([]);

        $elastiCube = 'cube';

        $this->clientMock->elastiCubes->getMetaData($elastiCube);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getFields()
     */
    public function testGetFields()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/elasticubes/metadata/cube/fields', 'GET', ['query' => []])
            ->willReturn([]);

        $elastiCube = 'cube';

        $this->clientMock->elastiCubes->getFields($elastiCube);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::executeSql()
     */
    public function testExecuteSql()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/elasticubes/cube/Sql', 'GET', ['query' => []])
            ->willReturn([]);

        $elastiCube = 'cube';

        $this->clientMock->elastiCubes->executeSql($elastiCube);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getAll()
     */
    public function testGetAll()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getAll();
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServers()
     */
    public function testGetServers()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/servers', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getServers();
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServer()
     */
    public function testGetServer()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/servers/serverName', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getServer('serverName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServerSimple()
     */
    public function testGetServerSimple()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/servers/serverName/simple', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getServerSimple('serverName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getServerStatus()
     */
    public function testGetServerStatus()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/servers/serverName/status', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getServerStatus('serverName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getDataSecurityRules()
     */
    public function testGetDataSecurityRules()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/serverName/cubeName/datasecurity', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getDataSecurityRules('serverName', 'cubeName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getUserDataSecurity()
     */
    public function testGetUserDataSecurity()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/serverName/cubeName/userName/datasecurity', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getUserDataSecurity('serverName', 'cubeName', 'userName');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getColumnDataSecurity()
     */
    public function testGetColumnDataSecurity()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/datasecurity/t/c', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getColumnDataSecurity('s', 'c', 't', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::getAuthRecords()
     */
    public function testGetAuthRecords()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/permissions', 'GET', ['query' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->getAuthRecords('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::startServer()
     */
    public function testStartServer()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/start', 'POST')
            ->willReturn([]);

        $this->clientMock->elastiCubes->startServer('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::stopServer()
     */
    public function testStopServer()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/stop', 'POST')
            ->willReturn([]);

        $this->clientMock->elastiCubes->stopServer('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::restartServer()
     */
    public function testRestartServer()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/restart', 'POST')
            ->willReturn([]);

        $this->clientMock->elastiCubes->restartServer('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::startBuild()
     */
    public function testStartBuild()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/startBuild', 'POST', ['form_params' => ['type' => 't']])
            ->willReturn([]);

        $this->clientMock->elastiCubes->startBuild('s', 'c', 't');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::stopBuild()
     */
    public function testStopBuild()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/stopBuild', 'POST', ['form_params' => []])
            ->willReturn([]);

        $this->clientMock->elastiCubes->stopBuild('s', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::executeJAQL()
     */
    public function testExecuteJAQL()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/c/jaql', 'POST', ['form_params' => ['jaql' => 'jaql']])
            ->willReturn([]);

        $this->clientMock->elastiCubes->executeJAQL('jaql', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::defineDataSecurity()
     */
    public function testDefineDataSecurity()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/datasecurity', 'POST', ['form_params' => ['body' => []]])
            ->willReturn([]);

        $this->clientMock->elastiCubes->defineDataSecurity('s', 'c', []);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::addDataSecurity()
     */
    public function testAddDataSecurity()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/datasecurity', 'POST', ['form_params' => ['parameters']])
            ->willReturn([]);

        $this->clientMock->elastiCubes->addDataSecurity(['parameters']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::attachDetachFolder()
     */
    public function testAttachDetachFolder()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/attachDetach', 'POST', ['form_params' => ['body' => ['body']]])
            ->willReturn([]);

        $this->clientMock->elastiCubes->attachDetachFolder('s', 'c', ['body']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::definePermission()
     */
    public function testDefinePermission()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/permissions', 'POST', ['form_params' => ['shares' => ['shares']]])
            ->willReturn([]);

        $this->clientMock->elastiCubes->definePermission('s', 'c', ['shares']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::updatePermissions()
     */
    public function testUpdatePermissions()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/permissions', 'PUT', ['shares' => ['shares']])
            ->willReturn([]);

        $this->clientMock->elastiCubes->updatePermissions('s', 'c', ['shares']);
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::deleteDataContext()
     */
    public function testDeleteDataContext()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/datasecurity/t/c', 'DELETE', [])
            ->willReturn([]);

        $this->clientMock->elastiCubes->deleteDataContext('s', 'c', 't', 'c');
    }

    /**
     * @covers \Sisense\Api\V09\ElastiCubes::deleteAllPermissions()
     */
    public function testDeleteAllPermissions()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('elasticubes/s/c/datasecurity/t/c', 'DELETE', [])
            ->willReturn([]);

        $this->clientMock->elastiCubes->deleteAllPermissions('s', 'c', 't', 'c');
    }
}
