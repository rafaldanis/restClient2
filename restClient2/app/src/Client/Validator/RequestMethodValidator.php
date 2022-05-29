<?php
namespace App\Client\Validator;

class RequestMethodValidator implements ValidatorInterface
{
    private array $allowedMethod = ['POST','GET','PUT','PATCH']; //etc, this is only example

    /**
     * @throws Exception
     */
    public function valid($param): void
    {
        if (!in_array($param, $this->allowedMethod)) {
            throw new \InvalidArgumentException('invalid param ' . $param);
        }
    }
}