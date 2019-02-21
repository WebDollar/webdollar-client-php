<?php

namespace WebDollar\Client\Tests\Unit\Methods;

use PHPUnit\Framework\TestCase;
use WebDollar\Client\Methods\AbstractMethod;

/**
 * Class AbstractMethodTest
 * @package WebDollar\Client\Tests\Unit\Methods
 */
class AbstractMethodTest extends TestCase
{
    public function testGetMethods()
    {
        static::assertCount(27, AbstractMethod::getMethods());
    }

    public function testAddMethod()
    {
        $sMethodClass = get_class(new class {});
        AbstractMethod::addMethod('testMethod', $sMethodClass);

        static::assertArrayHasKey('testMethod', AbstractMethod::getMethods());
        static::assertEquals($sMethodClass, AbstractMethod::getMethods()['testMethod']);
    }

    public function testAddMethodInvalidName()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Method name "invalid method name" is invalid.');
        AbstractMethod::addMethod('invalid method name', 'class');
    }

    public function testAddMethodInvalidClassAsObject()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Method class [] is not a string or the class does not exist');
        AbstractMethod::addMethod('testMethod', new \stdClass());
    }

    public function testAddMethodInvalidClassNonexistent()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Method class [InvalidClass] is not a string or the class does not exist');
        AbstractMethod::addMethod('testMethod', 'InvalidClass');
    }
}
