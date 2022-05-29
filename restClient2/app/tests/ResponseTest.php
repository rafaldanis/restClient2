<?php
require 'vendor/autoload.php';

use App\Client\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    //and more test method to test with*

    public function testResponseWithStatusCode(): void
    {
        $response = new Response();
        $response->withStatus(404);

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertSame('Not Found', $response->getReasonPhrase());
    }

    public function testResponse(): void
    {
        $curlData = [
            'httpCode' => 200,
            'body' => '{"example"}',
            'headers' => ['Content-Type' => 'application/json']
        ];

        $response = new Response($curlData);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(['Content-Type' => 'application/json'], $response->getHeaders());
        $this->assertEquals('{"example"}', $response->getBody());
        $this->assertSame('OK', $response->getReasonPhrase());
        //and more methods from Response
    }
}