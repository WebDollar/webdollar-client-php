<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\GetBlocksByRange;
use WebDollar\Client\Model\Block;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

/**
 * Class GetBlocksByRangeTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class GetBlocksByRangeTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new GetBlocksByRange();
        $oMethod->bind(ResponseGenerator::generateResponse([
            [
                'block_id' => 1
            ]
        ]));

        static::assertEquals('getBlocksByRange', $oMethod->getMethodName());
        static::assertNotEmpty($oMethod->getBlocks());
        static::assertCount(1, $oMethod->getBlocks());
        static::assertInstanceOf(Block::class, $oMethod->getBlocks()[0]);
    }
}
