<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class DataSourcesTest
 */
class DataSourcesTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\DataSources::getRevisionId()
     */
    public function testGetRevisionId()
    {
        $this->expects('datasources/s/t/revision', 'GET');

        $this->clientMock->dataSources->getRevisionId('s', 't');
    }
}
