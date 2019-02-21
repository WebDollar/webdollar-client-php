<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\GetBlockCount;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class GetBlockCountTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class GetBlockCountTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new GetBlockCount();
        $oMethod->bind(ResponseGenerator::generateResponse(1));

        static::assertEquals('getBlockCount', $oMethod->getMethodName());
        static::assertEquals(1, $oMethod->getQuantity());
    }
}
