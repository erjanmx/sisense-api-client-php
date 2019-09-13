<?php

namespace Tests\Api;

/**
 * Class ApplicationTest
 */
class ApplicationTest extends BaseApiTest
{
    /**
     * @covers \Sisense\Api\Application::status
     */
    public function testStatus()
    {
        $this->expects('v1/application/status', 'GET');

        $this->clientMock->application->status();
    }
}
