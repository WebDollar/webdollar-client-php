<?php

namespace WebDollar\Client\Tests\Unit\Middleware;

use Graze\GuzzleHttp\JsonRpc\Message\Request;
use Graze\GuzzleHttp\JsonRpc\Message\Response;
use PHPUnit\Framework\TestCase;
use WebDollar\Client\Middleware\ErrorMiddleware;
use function GuzzleHttp\Psr7\stream_for;
use Graze\GuzzleHttp\JsonRpc;

/**
 * Class ErrorMiddlewareTest
 * @package WebDollar\Client\Tests\Unit\Middleware
 */
class ErrorMiddlewareTest extends TestCase
{
    public function testShouldHandle401Status()
    {
        $oMiddleware = new ErrorMiddleware();
        $oRequest    = (new Request('POST', '/'))->withBody(stream_for(JsonRpc\json_encode([
            'id'      => 1,
            'jsonrpc' => 2.0
        ])));
        $oResponse = new Response(401);

        $oResponse = $oMiddleware->applyResponse($oRequest, $oResponse, []);
        $aBody     = JsonRpc\json_decode($oResponse->getBody(), TRUE);

        static::assertArrayHasKey('error', $aBody);
        static::assertEquals('2.0', $aBody['jsonrpc']);
        static::assertEquals(1, $aBody['id']);
        static::assertEquals(-32000, $aBody['error']['code']);
        static::assertEquals('Unauthorized. Invalid Username or Password', $aBody['error']['message']);
    }

    public function testShouldHandle429Status()
    {
        $oMiddleware = new ErrorMiddleware();
        $oRequest    = (new Request('POST', '/'))->withBody(stream_for(JsonRpc\json_encode([
            'id'      => 1,
            'jsonrpc' => 2.0
        ])));
        $oResponse = new Response(429);

        $oResponse = $oMiddleware->applyResponse($oRequest, $oResponse, []);
        $aBody     = JsonRpc\json_decode($oResponse->getBody(), TRUE);

        static::assertArrayHasKey('error', $aBody);
        static::assertEquals('2.0', $aBody['jsonrpc']);
        static::assertEquals(1, $aBody['id']);
        static::assertEquals(-32000, $aBody['error']['code']);
        static::assertEquals('Too Many Requests! Please try again later.', $aBody['error']['message']);
    }
}
