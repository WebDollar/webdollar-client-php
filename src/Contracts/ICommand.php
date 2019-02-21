<?php

namespace WebDollar\Client\Contracts;

use Graze\GuzzleHttp\JsonRpc\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use WebDollar\Client\Contracts\Component\IInput;

/**
 * Interface ICommand
 * @package WebDollar\Contracts
 */
interface ICommand
{
    /**
     * Get the name of the command
     *
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return ClientInterface|null
     */
    public function getClient():? ClientInterface;

    /**
     * @param ClientInterface $client
     */
    public function setClient(ClientInterface $client): void;

    /**
     * @param IInput $oInput
     *
     * @return PromiseInterface
     */
    public function run(IInput $oInput): PromiseInterface;
}
