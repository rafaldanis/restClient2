<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Client\Uri;

class UriTest extends TestCase
{
    public function stringTest(): void
    {
        $uri = new Uri('https://example.com');

        $this->assertSame('https://example.com', (string) $uri);
    }

    public function getHttpSchemeTest()
    {
        $uri = new Uri('http://example.com');
        $this->assertSame('http', $uri->getScheme());
    }

    public function getHttpsSchemeTest()
    {
        $uri = new Uri('https://example.com');
        $this->assertSame('https', $uri->getScheme());
    }

    public function getAuthorityTest()
    {
        $uri = new Uri('https://user:pass@example.com');
        $this->assertSame('user:pass@example.com', $uri->getAuthority());
    }

    public function getUserInfoTest()
    {
        $uri = new Uri('https://user:pass@example.com');
        $this->assertSame('user:pass', $uri->getUserInfo());
    }

    public function getHostTest()
    {
        $uri = new Uri('https://example.com');
        $this->assertSame('example.com', $uri->getHost());
    }

    public function getNotStandardPortTest()
    {
        $uri = new Uri('http://example.com:8080');
        $this->assertSame('8080', $uri->getPort());
    }

    public function getHttpPortTest()
    {
        $uri = new Uri('http://example.com');
        $this->assertSame('80', $uri->getPort());
    }

    public function getHttpsPortTest()
    {
        $uri = new Uri('https://example.com');
        $this->assertSame('443', $uri->getPort());
    }

    public function getPathTest()
    {
        $uri = new Uri('https://example.com/page1/page2');
        $this->assertSame('/page1/page2', $uri->getQuery());
    }

    public function getQueryTest()
    {
        $uri = new Uri('https://example.com?query=example_query');
        $this->assertSame('query=example_query', $uri->getQuery());
    }

    public function getFragmentTest()
    {
        $uri = new Uri('https://example.com#anchor');
        $this->assertSame('anchor', $uri->getFragment());
    }

    public function onlyProtocolHttpsTest()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid param https://');

        new Uri('https://');
    }

    public function onlyProtocolHttpTest()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('invalid param http://');

        new Uri('http://');
    }
}