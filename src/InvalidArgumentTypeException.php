<?php

namespace Krixon\Exception;

/**
 * Thrown when an argument of an invalid type is encountered.
 */
class InvalidArgumentTypeException extends \InvalidArgumentException
{
    
    private $expectedTypes;
    private $actualType;
    
    
    /**
     * @param string|string[] $expectedTypes An array of expected type names.
     * @param int             $actualValue   The actual value received.
     * @param string          $message       An optional error message.
     * @param \Exception|null $previous
     */
    public function __construct($expectedTypes, $actualValue, $message = '', $code = 0, \Exception $previous = null)
    {
        if (!is_array($expectedTypes)) {
            $expectedTypes = [$expectedTypes];
        }
        
        if (empty($expectedTypes)) {
            throw new \LogicException('At least one expected type must be specified.');
        }
        
        $this->expectedTypes = $expectedTypes;
        $this->actualType    = is_object($actualValue) ? get_class($actualValue) : gettype($actualValue);
        
        if (empty($message)) {
            $message = sprintf(
                'Invalid argument type: expected %s but got %s.',
                count($this->expectedTypes) > 1
                    ? sprintf('one of [%s]', implode(', ', $this->expectedTypes)) 
                    : current($this->expectedTypes),
                $this->actualType
            );
        }
        
        parent::__construct($message, $code, $previous);
        
        
    }
    
    
    public function getExpectedTypes()
    {
        return $this->expectedTypes;
    }
    
    
    public function getActualType()
    {
        return $this->actualType;
    }
    
}
