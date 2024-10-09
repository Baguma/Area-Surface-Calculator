<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AreaSurfaceCalculatorTest extends WebTestCase
{
    function testCircleCalculation()
    {
        $client = static::createClient();
        $client->request('GET', '/circle/8');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(201.06, round($responseData['surface'], 2));
        $this->assertEquals(50.26, round($responseData['circumference'], 2));
    }

    function testTriangleCalculation()
    {
        $client = static::createClient();
        $client->request('GET', '/triangle/3/4/5');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());

        $responseData = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals(6, round($responseData['surface'], 2));
        $this->assertEquals(12, round($responseData['circumference'], 2));
    }
}