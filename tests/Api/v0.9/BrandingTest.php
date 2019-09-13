<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class BrandingTest
 */
class BrandingTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
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
