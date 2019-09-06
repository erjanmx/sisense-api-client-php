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
}
