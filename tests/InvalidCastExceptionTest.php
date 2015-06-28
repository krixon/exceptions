<?php

namespace Krixon\Exception\Test;

use Krixon\Exception\InvalidCastException;

class InvalidCastExceptionTest extends \PHPUnit_Framework_TestCase
{
    
    public function testHoldsExpectedTypes()
    {
        $e = new InvalidCastException('string', 'int');
        
        $this->assertSame('string', $e->getFrom());
        $this->assertSame('int', $e->getTo());
    }
    
    
    public function testCreatesMessageIfNoneProvided()
    {
        $e = new InvalidCastException('string', 'Foo\Bar');
        
        $this->assertSame('Invalid type cast: string to Foo\Bar.', $e->getMessage());
    }
    
}
