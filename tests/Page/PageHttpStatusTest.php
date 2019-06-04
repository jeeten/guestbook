<?php

namespace tests\AppBundle\Functional;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageHttpStatusTest extends WebTestCase
{
    /**
    *
    *
    * testPageHttpStatus
    *
    * @param  mixed $web
    *
    * @return void
    * @dataProvider provideUrls
    */
    public function testPageHttpStatus($web)
    {
        $web = (object) $web;
        $client = static::createClient( array(), array(
            'HTTP_HOST' => 'PageHttpStatus', // Set HOST HTTP Header.
            'HTTP_USER_AGENT' => 'Symfony Browser/1.0', // Set Agent header.
         ));
         $client->request($web->method, $web->url);
         $response = $client->getResponse();
        // $client->getResponse()->getStatusCode();
        
        $this->assertEquals($web->code,$response->getStatusCode());
    }
    /**
     * provideUrls
     *
     * @return void
     */
    public function provideUrls()
    {
        return [
            [["method"=>"GET","url" => 'http://127.0.0.1:8000/',"code"=>200]],
            [["method"=>"GET","url" => 'http://127.0.0.1:8000/guest/',"code"=>200]],

            [["method"=>"GET","url" => 'http://127.0.0.1:8000/guest/new',"code"=>302,'rurl'=>"/login" , "rcode" => 200]],
            [["method"=>"POST","url" => 'http://127.0.0.1:8000/guest/new',"code"=>302,'rurl'=>"/login" , "rcode" => 200]],

            [["method"=>"GET","url" => 'http://127.0.0.1:8000/guest/1',"code"=>302,'rurl'=>"/login" , "rcode" => 200]],

            [["method"=>"GET","url" => 'http://127.0.0.1:8000/guest/3/edit',"code"=>302]],
            [["method"=>"POST","url" => 'http://127.0.0.1:8000/guest/3/edit',"code"=>302]],

            [["method"=>"GET","url" => 'http://127.0.0.1:8000/register',"code"=>200]],
            [["method"=>"POST","url" => 'http://127.0.0.1:8000/register',"code"=>200]],

            [["method"=>"GET","url" => 'http://127.0.0.1:8000/login',"code"=>200]],
            [["method"=>"POST","url" => 'http://127.0.0.1:8000/login',"code"=>302]],

            [["method"=>"GET","url" => 'http://127.0.0.1:8000/logout',"code"=>302]],
            [["method"=>"POST","url" => 'http://127.0.0.1:8000/logout',"code"=>302]],
        ];
    }
}
