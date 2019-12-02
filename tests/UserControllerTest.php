<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testPutUserAction(): void
    {
        $client = static::createClient();
        $client->request('PUT', '/user');
        $this->assertEquals($client->getResponse()->getContent(), '{"status":"success","user_name":"Volodia"}');
    }

    public function testGetUserByAgeAction(): void
    {
        $client = static::createClient();
        $client->request('GET', '/user/by/age');
        $this->assertEquals($client->getResponse()->getContent(), '{"User":{"id":1,"name":"Volodia","age":11}}');
    }
}
