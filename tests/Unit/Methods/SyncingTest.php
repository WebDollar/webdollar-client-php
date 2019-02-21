<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\Syncing;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class SyncingTest
 * @package WebDollar\Client\Tests\Methods
 */
class SyncingTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new Syncing();
        $oMethod->bind(ResponseGenerator::generateResponse([
            'currentBlock'   => 611016,
            'isSynchronized' => TRUE,
            'secondsBehind'  => 67.722,
        ]));

        static::assertEquals('syncing', $oMethod->getMethodName());
        static::assertEquals(611016, $oMethod->currentBlock());
        static::assertEquals(67.722, $oMethod->secondsBehind());
        static::assertTrue($oMethod->isSynchronized());
    }
}
