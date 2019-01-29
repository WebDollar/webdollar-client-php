<?php

namespace WebDollar\Client\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use WebDollar\Client\Contracts\ICommand;
use WebDollar\Client\Exception\MethodNotFoundException;
use WebDollar\Client\Model\Block;

/**
 * Class GetBlockByNumber
 * @package WebDollar\Client\Methods
 */
class GetBlockByNumber extends AbstractMethod
{
    public function getBlock()
    {
        if ($this->getRawResult() === NULL)
        {
            return NULL;
        }

        return Block::constructFrom($this->getRawResult());
    }
}
