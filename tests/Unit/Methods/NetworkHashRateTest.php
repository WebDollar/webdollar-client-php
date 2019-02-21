<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\NetworkHashRate;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class NetworkHashRateTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class NetworkHashRateTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new NetworkHashRate();
        $oMethod->bind(ResponseGenerator::generateResponse(
            1000
        ));

        static::assertEquals('networkHashRate', $oMethod->getMethodName());
        static::assertEquals(1000, $oMethod->getQuantity());
    }
}
