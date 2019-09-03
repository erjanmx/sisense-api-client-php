<?php

use Sisense\Client;
use Sisense\ClientInterface;
use PHPUnit\Framework\TestCase;

class AuthTest extends TestCase
{
    /**
     * @covers \Sisense\Api\Auth
     * @test
     */
    public function testLogin()
    {
        $client = new Client('https://sisense02.pbp.sh/api/');

        $client->login('r.stolk@pointerbp.nl', 'Plantenbak1');

        $r = $client->auth->isAuth();

        var_dump($r);

        $this->assertSame('http://localhost', $client->getUrl());
    }
}
