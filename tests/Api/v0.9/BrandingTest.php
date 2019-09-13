<?php

namespace Sisense\Tests\Api\V09;

use Sisense\Client;
use Sisense\Api\V09\Branding;
use PHPUnit\Framework\TestCase;

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

    public function expects($path, $method, $options = [])
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with($path, $method, $options)
            ->willReturn([]);
    }

    /**
     * Test case for getBranding
     *
     * Returns the current branding metadata.
     *
     */
    public function testGetBranding()
    {
        $this->expects('branding/', 'GET');

        $this->clientMock->branding->getBranding();
    }

    /**
     * Test case for resetBranding
     *
     * Resets the current branding to the default Sisense branding.
     *
     */
    public function testResetBranding()
    {
        $this->expects('branding/', 'DELETE');

        $this->clientMock->branding->resetBranding();
    }

    /**
     * Test case for setBranding
     *
     * Adds new branding to your Sisense dashboards.
     *
     */
    public function testSetBranding()
    {
        $this->expects('branding/', 'POST', ['json' => ['foo' => 'bar']]);

        $this->clientMock->branding->setBranding(['foo' => 'bar']);
    }
}
