<?php

namespace WebDollar\Client\Component;

use WebDollar\Client\Contracts\Component\IInput;

/**
 * Class Input
 * @package WebDollar\Client\Component
 */
class Input implements IInput
{
    /**
     * @var array
     */
    private $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }
}
