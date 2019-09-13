<?php

namespace Tests\Api;

/**
 * Class AuthenticationTest
 */
class AuthenticationTest extends BaseApiTest
{
    /**
     * @covers \Sisense\Api\Authentication::login
     */
    public function testLogin()
    {
        $this->expects('v1/authentication/login', 'POST', ['form_params' => ['username' => 'u', 'password' => 'p']]);

        $this->clientMock->authentication->login('u', 'p');
    }

    /**
     * @covers \Sisense\Api\Authentication::logout
     */
    public function testLogout()
    {
        $this->expects('v1/authentication/logout', 'GET', ['query' => ['targetDevice' => 'c']]);

        $this->clientMock->authentication->logout('c');
    }
}
