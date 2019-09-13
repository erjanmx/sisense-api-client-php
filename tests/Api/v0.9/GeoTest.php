<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class GeoTest
 */
class GeoTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\Geo::geoJson()
     */
    public function testGeoJson()
    {
        $this->expects('geo/geoJson/s', 'GET');

        $this->clientMock->geo->geoJson('s');
    }

    /**
     * @covers \Sisense\Api\V09\Geo::getGeo()
     */
    public function testGetGeo()
    {
        $this->expects('geo/location', 'POST', ['json' => ['geoParams' => ['foo']]]);

        $this->clientMock->geo->getGeo(['foo']);
    }
}
