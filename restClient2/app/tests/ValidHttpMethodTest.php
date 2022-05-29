<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Client\Validator\RequestMethodValidator;

class ValidHttpMethodTest extends TestCase
{
    public function methodPutParamTest(): void
    {
        (new RequestMethodValidator())->valid('PUT');

        $this->assertTrue(true);
    }

    public function methodGetParamTest(): void
    {
        (new RequestMethodValidator())->valid('GET');

        $this->assertTrue(true);
    }

    public function methodPostParamTest(): void
    {
        (new RequestMethodValidator())->valid('POST');

        $this->assertTrue(true);
    }

    public function methodPatchParamTest(): void
    {
        (new RequestMethodValidator())->valid('PATCH');

        $this->assertTrue(true);
    }

    public function badMethodParamTest(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("invalid param NOT_ALLOWED_PARAM");
        (new RequestMethodValidator())->valid('NOT_ALLOWED_PARAM', '', []);
    }
}