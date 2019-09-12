<?php

namespace Sisense\Tests\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class SettingsTest
 */
class SettingsTest extends TestCase
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
     * @covers \Sisense\Api\V09\Settings::getApi()
     */
    public function testGetAll()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/api', 'GET')
            ->willReturn([]);

        $this->clientMock->settings->getApi();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::getSystem()
     */
    public function testGetSystem()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/system', 'GET')
            ->willReturn([]);

        $this->clientMock->settings->getSystem();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::setSystem()
     */
    public function testSetSystem()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/system', 'POST', ['form_params' => ['foo' => 'bar']])
            ->willReturn([]);

        $this->clientMock->settings->setSystem(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::getProxy()
     */
    public function testGetProxy()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/proxy', 'GET')
            ->willReturn([]);

        $this->clientMock->settings->getProxy();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::addProxy()
     */
    public function testAddProxy()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/proxy', 'POST', ['form_params' => ['proxyConfig' => ['bar']]])
            ->willReturn([]);

        $this->clientMock->settings->addProxy(['bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::updateProxy()
     */
    public function testUpdateProxy()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/proxy', 'PUT', ['proxyConfig' => ['bar']])
            ->willReturn([]);

        $this->clientMock->settings->updateProxy(['bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::deleteProxy()
     */
    public function testDeleteProxy()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/proxy', 'DELETE', ['foo' => 'bar'])
            ->willReturn([]);

        $this->clientMock->settings->deleteProxy(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::getSecurity()
     */
    public function testGetSecurity()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/security', 'GET')
            ->willReturn([]);

        $this->clientMock->settings->getSecurity();
    }

    /**
     * @covers \Sisense\Api\V09\Settings::setSecurity()
     */
    public function testSetSecurity()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/security', 'POST', ['form_params' => ['securityConfig' => ['foo' => 'bar']]])
            ->willReturn([]);

        $this->clientMock->settings->setSecurity(['foo' => 'bar']);
    }

    /**
     * @covers \Sisense\Api\V09\Settings::generateApi()
     */
    public function testGenerateApi()
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('settings/api/generate', 'GET')
            ->willReturn([]);

        $this->clientMock->settings->generateApi();
    }
}
