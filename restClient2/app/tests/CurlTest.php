<?php
require 'vendor/autoload.php';

use App\Client\Curl\Curl;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class CurlTest extends TestCase
{
    public function testMethodGetRequest(): void
    {
        $curl = new Curl();
        $curl->withMethod('GET');
        $response = $curl->request('https://example');

        $this->assertIsArray($response);

        $this->assertArrayHasKey('httpCode', $response);
        $this->assertIsInt($response['httpCode']);

        $this->assertArrayHasKey('headers', $response);
        $this->assertIsArray($response['headers']);

        $this->assertArrayHasKey('body', $response);
        $this->assertIsString($response['body']);
    }
}