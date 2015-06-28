<?php

namespace Krixon\Exception;

/**
 * Thrown when an argument with an invalid value is encountered.
 */
class InvalidArgumentValueException extends \InvalidArgumentException
{
    
    /**
     * @inheritdoc
     */
    public function __construct($message = '', $code = 0, \Exception $previous = null)
    {
        if (empty($message)) {
            $message = 'Invalid argument value.';
        }
        
        parent::__construct($message, $code, $previous);
    }
    
}
