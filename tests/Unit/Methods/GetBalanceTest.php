<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\GetBalance;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class GetBalanceTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class GetBalanceTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new GetBalance();
        $oMethod->bind(ResponseGenerator::generateResponse(10000));

        static::assertEquals('getBalance', $oMethod->getMethodName());
        static::assertEquals(10000, $oMethod->getQuantity());
    }
}
