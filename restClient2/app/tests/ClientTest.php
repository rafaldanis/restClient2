<?php
require 'vendor/autoload.php';

use App\Client\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testMethodGetRequest(): void
    {
        $response = (new Client())->request('GET', 'https://example');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testMethodPostRequest(): void
    {
        $options['auth'] = ['Bearer', 'xxx'];
        $options['body'] = ['example'];

        $response = (new Client())->request('POST', 'https://example/', $options);

        $this->assertEquals(201, $response->getStatusCode());
    }

    public function testMethodPatchRequest(): void
    {
        $options['auth'] = ['Bearer', 'xxx'];
        $options['body'] = ['example'];

        $response = (new Client())->request('PATCH', 'https://example/1', $options);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testMethodPutRequest(): void
    {
        $options['auth'] = ['Bearer', 'xxx'];
        $options['body'] = ['example'];

        $response = (new Client())->request('PATCH', 'https://example/1', $options);

        $this->assertEquals(200, $response->getStatusCode());
    }
}