<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\ProtocolVersion;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class ProtocolVersionTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class ProtocolVersionTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new ProtocolVersion();
        $oMethod->bind(ResponseGenerator::generateResponse("1.210.9"));

        static::assertEquals('protocolVersion', $oMethod->getMethodName());
        static::assertEquals("1.210.9", $oMethod->getVersion());
    }
}
