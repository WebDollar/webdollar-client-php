<?php

namespace WebDollar\Client\Contracts;

/**
 * Interface ICommand
 * @package WebDollar\Contracts
 */
interface ICommand extends \ArrayAccess, \Countable, \IteratorAggregate
{
    /**
     * Converts the command parameters to an array
     *
     * @return array
     */
    public function toArray();

    /**
     * Get the name of the command
     *
     * @return string
     */
    public function getName();

    /**
     * Check if the command has a parameter by name.
     *
     * @param string $name Name of the parameter to check
     *
     * @return bool
     */
    public function hasParam($name);
}
