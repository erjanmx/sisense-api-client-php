<?php

namespace Sisense\Tests\Api\V09;

use Sisense\Client;
use PHPUnit\Framework\TestCase;
use Sisense\Api\V09\Authorization;

/**
 * Class AuthorizationTest
 *
 */
class AuthorizationTest extends TestCase
{
    /**
     * @var Authorization
     */
    protected $m;

    public function expectsRequestWith($arguments)
    {
        $clientMock = $this->createPartialMock(Client::class, ['runRequest']);

        $clientMock->expects($this->once())
            ->method('runRequest')
            ->with(...func_get_args())
            ->willReturn([]);

        $this->m = $clientMock->v('v0.9')->authorization;
    }

    public function testIsAuthenticated()
    {
        $this->expectsRequestWith('auth/isauth', 'GET');

        $this->m->isAuthenticated();
    }

    public function testLogout()
    {
        $this->expectsRequestWith('auth/logout', 'GET');
        $this->m->logout();
    }
}
