<?php

namespace Krixon\Exception\Test;

use Krixon\Exception\InvalidArgumentTypeException;

class InvalidArgumentTypeExceptionTest extends \PHPUnit_Framework_TestCase
{
    
    /**
     * @dataProvider expectedTypesProvider
     * 
     * @param string|string[] $input
     * @param string[]        $expected
     */
    public function testHoldsExpectedTypes($input, array $expected)
    {
        $e = new InvalidArgumentTypeException($input, 'foo');
        
        $this->assertSame($expected, $e->getExpectedTypes());
    }
    
    
    public function expectedTypesProvider()
    {
        return [
            [['int', 'float'], ['int', 'float']],
            ['int', ['int']],
            ['Foo\Bar', ['Foo\Bar']],
        ];
    }
    
    
    /**
     * @dataProvider actualTypeProvider
     * 
     * @param mixed $input
     * @param string $expected
     */
    public function testHoldsActualType($input, $expected)
    {
        $e = new InvalidArgumentTypeException(['int'], $input);
        
        $this->assertSame($expected, $e->getActualType());
    }
    
    
    public function actualTypeProvider()
    {
        return [
            ['lister', 'string'],
            [123, 'integer'],
            [123.45, 'double'],
            [true, 'boolean'],
            [false, 'boolean'],
            [new \stdClass, 'stdClass'],
        ];
    }
    
    
    /**
     * @dataProvider defaultMessageProvider
     * 
     * @param string|string[] $types
     * @param string          $expected
     */
    public function testCreatesMessageIfNoneProvided($types, $expected)
    {
        $e = new InvalidArgumentTypeException($types, 'foo');
        
        $this->assertSame($expected, $e->getMessage());
    }
    
    
    public function defaultMessageProvider()
    {
        return [
            [['int', 'float'], 'Invalid argument type: expected one of [int, float] but got string.'],
            ['int', 'Invalid argument type: expected int but got string.'],
        ];
    }
    
    
    public function testAtLeastOneExpectedTypeMustBeSpecified()
    {
        $this->setExpectedException('LogicException');
        
        new InvalidArgumentTypeException([], 'foo');
    }
    
}
