<?php

namespace Tests\Api\V09;

use Tests\Api\BaseApiTest;

/**
 * Class AuthorizationTest
 *
 */
class AuthorizationTest extends BaseApiTest
{
    public function setUp()
    {
        parent::setUp();

        $this->clientMock->useVersion('v0.9', true);
    }

    public function testIsAuthenticated()
    {
        $this->expects('auth/isauth', 'GET');

        $this->clientMock->authorization->isAuthenticated();
    }

    public function testLogout()
    {
        $this->expects('auth/logout', 'GET');

        $this->clientMock->authorization->logout();
    }
}
