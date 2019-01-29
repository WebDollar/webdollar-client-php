<?php

namespace WebDollar\Client\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use WebDollar\Client\Contracts\ICommand;
use WebDollar\Client\Exception\MethodNotFoundException;
use WebDollar\Client\Model\Block;

/**
 * Class GetBlockByHash
 * @package WebDollar\Client\Methods
 */
class GetBlockByHash extends AbstractMethod
{
    public function getBlock()
    {
        if ($this->getRawResult() === NULL)
        {
            return NULL;
        }

        return Block::constructFrom($this->getRawResult());
    }

    public static function constructFromResponseAndCommand(ResponseInterface $oResponse, ICommand $oCommand)
    {
        throw new MethodNotFoundException(sprintf('Method with name %s is not supported', $oCommand->getName()));
    }
}
