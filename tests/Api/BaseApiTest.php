<?php

namespace Sisense\Tests\Api;

use Sisense\Client;
use PHPUnit\Framework\TestCase;

/**
 * Class BaseApiTest
 */
class BaseApiTest extends TestCase
{
    protected $m;

    /**
     * @var MockObject|Client
     */
    protected $clientMock;

    public function setUp()
    {
        parent::setUp();

        $this->clientMock = $this->createPartialMock(Client::class, ['runRequest']);
    }

    public function testOne()
    {
        $this->assertTrue(true);
    }

    public function expectsRequestWith($arguments)
    {
        $this->clientMock->expects($this->once())
            ->method('runRequest')
            ->with(...func_get_args())
            ->willReturn([]);
    }
}
