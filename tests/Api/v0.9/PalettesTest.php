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

    /**
     * @covers \Sisense\Api\V09\Palettes::getAll()
     */
    public function testGetAll()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('palettes/', 'GET')
            ->willReturn([]);

        $this->clientMock->palettes->getAll();
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::getDefault()
     */
    public function testGetDefault()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('palettes/default', 'GET')
            ->willReturn([]);

        $this->clientMock->palettes->getDefault();
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::addPalette()
     */
    public function testAddPalette()
    {
        $parameters = ['foo' => 'bar'];

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('palettes/', 'POST', ['form_params' => $parameters])
            ->willReturn([]);

        $this->clientMock->palettes->addPalette($parameters);
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::deletePalette()
     */
    public function testDeletePalette()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('palettes/p', 'DELETE')
            ->willReturn([]);

        $this->clientMock->palettes->deletePalette('p');
    }

    /**
     * @covers \Sisense\Api\V09\Palettes::updatePalette()
     */
    public function testUpdatePalette()
    {
        $parameters = ['foo' => 'bar'];

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('palettes/p', 'PUT', $parameters)
            ->willReturn([]);

        $this->clientMock->palettes->updatePalette('p', $parameters);
    }
}
