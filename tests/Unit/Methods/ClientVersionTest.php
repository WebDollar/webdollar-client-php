<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\ClientVersion;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class ClientVersionTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class ClientVersionTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new ClientVersion();
        $oMethod->bind(ResponseGenerator::generateResponse("1.0.0"));

        static::assertEquals('clientVersion', $oMethod->getMethodName());
        static::assertEquals("1.0.0", $oMethod->getVersion());
    }
}
