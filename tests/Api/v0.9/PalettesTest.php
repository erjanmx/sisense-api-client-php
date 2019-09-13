<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class PalettesTest
 */
class PalettesTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::getAll()
     */
    public function testGetAll()
    {
        $this->expects('palettes/', 'GET');

        $this->clientMock->palettes->getAll();
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::getDefault()
     */
    public function testGetDefault()
    {
        $this->expects('palettes/default', 'GET');

        $this->clientMock->palettes->getDefault();
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::addPalette()
     */
    public function testAddPalette()
    {
        $this->expects('palettes/', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->palettes->addPalette(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::deletePalette()
     */
    public function testDeletePalette()
    {
        $this->expects('palettes/p', 'DELETE');

        $this->clientMock->palettes->deletePalette('p');
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::updatePalette()
     */
    public function testUpdatePalette()
    {
        $this->expects('palettes/p', 'PUT', ['foo' => 'bar']);

        $this->clientMock->palettes->updatePalette('p', ['foo' => 'bar']);
    }
}
