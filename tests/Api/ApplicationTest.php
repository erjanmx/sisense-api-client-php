<?php

namespace Sisense\Tests;

use Sisense\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class ApplicationTest
 */
class ApplicationTest extends TestCase
{
    /**
     * @covers \Sisense\Api\Application
     */
    public function testStatus()
    {
        $mock = $this->createPartialMock(Client::class, ['runRequest']);

        $mock->expects($this->once())
            ->method('runRequest')
            ->with('application/status', 'GET')
            ->willReturn([]);

        $mock->application->status();
    }
}
