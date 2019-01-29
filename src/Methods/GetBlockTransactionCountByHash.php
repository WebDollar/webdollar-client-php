<?php

namespace WebDollar\Client\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;
use WebDollar\Client\Contracts\ICommand;
use WebDollar\Client\Exception\MethodNotFoundException;

/**
 * Class GetBlockTransactionCountByHash
 * @package WebDollar\Client\Methods
 */
class GetBlockTransactionCountByHash extends AbstractMethod
{
    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->getRawResult();
    }

    public static function constructFromResponseAndCommand(ResponseInterface $oResponse, ICommand $oCommand)
    {
        throw new MethodNotFoundException(sprintf('Method with name %s is not supported', $oCommand->getName()));
    }
}
