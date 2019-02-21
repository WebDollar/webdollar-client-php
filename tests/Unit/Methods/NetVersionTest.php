<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\NetVersion;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class NetVersionTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class NetVersionTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new NetVersion();
        $oMethod->bind(ResponseGenerator::generateResponse([
            'id'   => 1,
            'name' => 'Webdollar MainNet'
        ]));

        static::assertEquals('netVersion', $oMethod->getMethodName());
        static::assertEquals(1, $oMethod->getId());
        static::assertEquals('Webdollar MainNet', $oMethod->getName());
    }
}
