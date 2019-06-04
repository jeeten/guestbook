<?php

// namespace tests\AppBundle\Functional;
namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\CssSelector\CssSelectorConverter;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage;

class RegistrationControllerTest extends WebTestCase
{

    /**
     * testRegister
     *
     * @return void
     */
    public function testRegister()
    {
        // Client Object
        $client = static::createClient();

        // Crawler Object
        $crawler = $client->request('GET', '/register');

        // Response Object
        $response = $client->getResponse();
        $this->assertEquals(200,$response->getStatusCode());
        $this->assertContains("Create an Account!",trim($crawler->filter('h1.h4.text-gray-900.mb-4')->text()));

        
    }
}
