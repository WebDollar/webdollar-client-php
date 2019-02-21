<?php

namespace WebDollar\Client\Tests\Helpers;

use Graze\GuzzleHttp\JsonRpc\Message\MessageFactory;

/**
 * Class ResponseGenerator
 * @package WebDollar\Client\Tests\Helpers
 */
class ResponseGenerator
{
    /**
     * @param array|string|int $aResponseBody
     *
     * @return \Graze\GuzzleHttp\JsonRpc\Message\Response|\Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface
     */
    public static function generateResponse($aResponseBody)
    {
        $aResponseBody = [
            'jsonrpc' => "2.0",
            'id'      => 1,
            'result'  => $aResponseBody
        ];

        $oMessageFactory = new MessageFactory();
        return $oMessageFactory->createResponse(200, [], $aResponseBody);
    }
}
