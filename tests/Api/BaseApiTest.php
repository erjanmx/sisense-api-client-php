<?php

namespace Tests\Api;

use Sisense\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseApiTest
 */
abstract class BaseApiTest extends TestCase
{

    /**
     * @var MockObject|Client
     */
    protected $clientMock;

    public function setUp()
    {
        parent::setUp();

        $this->clientMock = $this->createPartialMock(Client::class, ['runRequest']);
    }

    public function expects($path, $method, $options = [])
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with($path, $method, $options)
            ->willReturn([]);
    }
}
