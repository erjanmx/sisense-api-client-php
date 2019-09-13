<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class ReportingTest
 */
class ReportingTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

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
            ->with('reporting/', 'POST', ['json' => $parameters])
            ->willReturn([]);

        $this->clientMock->reporting->shareReporting($parameters);
    }
}
