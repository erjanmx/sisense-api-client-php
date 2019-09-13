<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class SettingsTest
 */
class SettingsTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::getApi()
     */
    public function testGetAll()
    {
        $this->expects('settings/api', 'GET');

        $this->clientMock->settings->getApi();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::getSystem()
     */
    public function testGetSystem()
    {
        $this->expects('settings/system', 'GET');

        $this->clientMock->settings->getSystem();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::setSystem()
     */
    public function testSetSystem()
    {
        $this->expects('settings/system', 'POST', ['json' => ['emailServer' => ['foo' => 'bar']]]);

        $this->clientMock->settings->setSystem(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::getProxy()
     */
    public function testGetProxy()
    {
        $this->expects('settings/proxy', 'GET');

        $this->clientMock->settings->getProxy();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::addProxy()
     */
    public function testAddProxy()
    {
        $this->expects('settings/proxy', 'POST', ['json' => ['proxyConfig' => ['bar']]]);

        $this->clientMock->settings->addProxy(['bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::updateProxy()
     */
    public function testUpdateProxy()
    {
        $this->expects('settings/proxy', 'PUT', ['json' => ['proxyConfig' => ['bar']]]);

        $this->clientMock->settings->updateProxy(['bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::deleteProxy()
     */
    public function testDeleteProxy()
    {
        $this->expects('settings/proxy', 'DELETE');

        $this->clientMock->settings->deleteProxy();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::getSecurity()
     */
    public function testGetSecurity()
    {
        $this->expects('settings/security', 'GET');

        $this->clientMock->settings->getSecurity();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::setSecurity()
     */
    public function testSetSecurity()
    {
        $this->expects('settings/security', 'POST', ['json' => ['securityConfig' => ['foo' => 'bar']]]);

        $this->clientMock->settings->setSecurity(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::generateApi()
     */
    public function testGenerateApi()
    {
        $this->expects('settings/api/generate', 'GET');

        $this->clientMock->settings->generateApi();
    }
}
