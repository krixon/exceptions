<?php

namespace Krixon\Exception\Test;

use Krixon\Exception\InvalidArgumentValueException;

class InvalidArgumentValueExceptionTest extends \PHPUnit_Framework_TestCase
{
    
    public function testCreatesMessageIfNoneProvided()
    {
        $e = new InvalidArgumentValueException;
        
        $this->assertSame('Invalid argument value.', $e->getMessage());
    }
    
}
