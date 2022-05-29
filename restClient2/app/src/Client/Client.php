<?php
namespace App\Client;

use App\Client\Validator\RequestMethodValidator;
use App\Client\Curl\Curl;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;

class Client
{
    public function request(string $method, string $uri, array $options = []): ResponseInterface
    {
        (new RequestMethodValidator())->valid($method);

        $uri = $this->buildUri($uri);

        return new Response($this->createRequest($method, $uri, $options));
    }

    private function buildUri(string $uri): UriInterface
    {
        return new Uri($uri);
    }

    private function createRequest(string $method, Uri $uri, $options = [])
    {
        $curl = new Curl();
        $curl->withMethod($method);
        $curl->withOptions($options);

        return $curl->request((string) $uri);
    }
}