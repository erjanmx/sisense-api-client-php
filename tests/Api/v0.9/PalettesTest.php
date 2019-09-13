<?php

namespace Sisense\Tests\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class PalettesTest
 */
class PalettesTest extends TestCase
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

    public function expects($path, $method, $options = [])
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with($path, $method, $options)
            ->willReturn([]);
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
