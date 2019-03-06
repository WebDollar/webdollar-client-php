<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\NodeWaitList;
use WebDollar\Client\Tests\Helpers\ResponseGenerator;

class NodeWaitListTest extends TestCase
{
    public function testResponse()
    {
        $oMethod = new NodeWaitList();
        $oMethod->bind(ResponseGenerator::generateResponse([
            'http://node1.example.com',
        ]));

        static::assertEquals('nodeWaitList', $oMethod->getMethodName());
        static::assertCount(1, $oMethod->getList());
        static::assertEquals('http://node1.example.com', $oMethod->getList()[0]);
    }
}
