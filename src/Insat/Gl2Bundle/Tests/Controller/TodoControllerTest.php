<?php

namespace Insat\Gl2Bundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TodoControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/todo');
    }

    public function testAddtodo()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/todo/add');
    }

}
