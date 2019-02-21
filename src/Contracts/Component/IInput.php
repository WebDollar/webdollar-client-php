<?php

namespace WebDollar\Client\Contracts\Component;

/**
 * Interface IInput
 * @package WebDollar\Client\Contracts\Component
 */
interface IInput
{
    /**
     * @return array
     */
    public function getParameters(): array;
}
