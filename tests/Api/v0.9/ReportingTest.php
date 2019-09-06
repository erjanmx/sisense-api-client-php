<?php

namespace Sisense\Tests\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

/**
 * Class ReportingTest
 */
class ReportingTest extends TestCase
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
     * @covers \Sisense\Api\V09\Reporting::shareReporting()
     */
    public function testShareReporting()
    {
        $parameters = ['foo' => 'bar'];

        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with('reporting/', 'POST', ['form_params' => $parameters])
            ->willReturn([]);

        $this->clientMock->reporting->shareReporting($parameters);
    }
}
