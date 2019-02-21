<?php

namespace WebDollar\Client\Contracts\Methods;

use Graze\GuzzleHttp\JsonRpc\Message\ResponseInterface;

/**
 * Interface IMethod
 * @package WebDollar\Client\Contracts\Methods
 */
interface IMethod
{
    /**
     * @return string
     */
    public function getMethodName();

    /**
     * @return ResponseInterface
     */
    public function getResponse();

    /**
     * @return string|float|int|array
     */
    public function getRawResult();

    /**
     * @param ResponseInterface $oResponse
     *
     * @return IMethod
     */
    public function bind(ResponseInterface $oResponse): IMethod;
}
