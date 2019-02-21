<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\BlockNumber;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class BlockNumberTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class BlockNumberTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new BlockNumber();
        $oMethod->bind(ResponseGenerator::generateResponse(611057));

        static::assertEquals('blockNumber', $oMethod->getMethodName());
        static::assertEquals(611057, $oMethod->getQuantity());
    }
}
