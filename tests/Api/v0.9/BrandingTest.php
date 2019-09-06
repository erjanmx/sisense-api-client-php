<?php

namespace Sisense\Tests\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class BrandingTest
 */
class BrandingTest extends TestCase
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
     * @covers \Sisense\Api\V09\Branding::getAll()
     */
    public function testGetAll()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('branding/', 'GET')
            ->willReturn([]);

        $this->clientMock->branding->getAll();
    }

    /**
     * @covers \Sisense\Api\V09\Branding::addBranding()
     */
    public function testAddBranding()
    {
        $parameters = ['foo' => 'bar'];

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('branding/', 'POST', ['form_params' => $parameters])
            ->willReturn([]);

        $this->clientMock->branding->addBranding($parameters);
    }

    /**
     * @covers \Sisense\Api\V09\Branding::deleteBranding()
     */
    public function testDeleteBranding()
    {
        $parameters = ['foo' => 'bar'];

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('branding/', 'DELETE', $parameters)
            ->willReturn([]);

        $this->clientMock->branding->deleteBranding($parameters);
    }
}
