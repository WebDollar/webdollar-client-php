<?php

namespace WebDollar\Client\Middleware;

use Graze\GuzzleHttp\JsonRpc\Middleware\AbstractMiddleware;
use function GuzzleHttp\Psr7\stream_for;
use Psr\Http\Message\RequestInterface as HttpRequestInterface;
use Psr\Http\Message\ResponseInterface as HttpResponseInterface;
use Graze\GuzzleHttp\JsonRpc;

/**
 * Class ErrorMiddleware
 * @package WebDollar\Client\Middleware
 */
class ErrorMiddleware extends AbstractMiddleware
{
    public function applyResponse(HttpRequestInterface $request, HttpResponseInterface $response, array $options)
    {
        if ($response->getStatusCode() === 401)
        {
            $aRequestBody = JsonRpc\json_decode((string) $request->getBody(), true);
            $response     = $response->withBody(stream_for(JsonRpc\json_encode([
                "jsonrpc" => $aRequestBody['jsonrpc'],
                "id"      => $aRequestBody['id'],
                "error"   => [
                    "code"    => -32000,
                    "message" => "Unauthorized. Invalid Username or Password"
                ]
            ])));
        }

        if ($response->getStatusCode() === 429)
        {
            $aRequestBody = JsonRpc\json_decode((string) $request->getBody(), true);
            $response     = $response->withBody(stream_for(JsonRpc\json_encode([
                "jsonrpc" => $aRequestBody['jsonrpc'],
                "id"      => $aRequestBody['id'],
                "error"   => [
                    "code"    => -32000,
                    "message" => "Too Many Requests! Please try again later."
                ]
            ])));
        }

        return parent::applyResponse($request, $response, $options);
    }
}
