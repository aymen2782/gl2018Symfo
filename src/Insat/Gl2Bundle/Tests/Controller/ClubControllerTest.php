<?php

namespace Insat\Gl2Bundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClubControllerTest extends WebTestCase
{
    public function testShowform()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/showForm');
    }

    public function testListclubs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listClubs');
    }

}
