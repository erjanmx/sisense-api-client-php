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
     * @var Branding
     */
    protected $m;

    public function expectsRequestWith($arguments)
    {
        $clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $clientMock->expects($this->once())
            ->method('runRequest')
            ->with(...func_get_args())
            ->willReturn([]);

        $this->m = $clientMock->v('v0.9')->branding;
    }

    /**
     * Test case for getBranding
     *
     * Returns the current branding metadata.
     *
     */
    public function testGetBranding()
    {
        $this->expectsRequestWith('branding/', 'GET');

        $this->m->getBranding();
    }

    /**
     * Test case for resetBranding
     *
     * Resets the current branding to the default Sisense branding.
     *
     */
    public function testResetBranding()
    {
        $this->expectsRequestWith('branding/', 'DELETE');

        $this->m->resetBranding();
    }

    /**
     * Test case for setBranding
     *
     * Adds new branding to your Sisense dashboards.
     *
     */
    public function testSetBranding()
    {
        $this->expectsRequestWith('branding/', 'POST', ['json' => ['foo' => 'bar']]);

        $this->m->setBranding(['foo' => 'bar']);
    }
}
