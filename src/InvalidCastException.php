<?php

namespace Krixon\Exception;

use Exception;

class InvalidCastException extends \LogicException
{
    
    private $from;
    private $to;
    
    
    /**
     * @param string         $from
     * @param int            $to
     * @param string         $message
     * @param int            $code
     * @param Exception|null $previous
     */
    public function __construct($from, $to, $message = '', $code = 0, Exception $previous = null)
    {
        $this->from = $from;
        $this->to   = $to;
        
        if (empty($message)) {
            $message = sprintf('Invalid type cast: %s to %s.', $this->from, $this->to);
        }
        
        parent::__construct($message, $code, $previous);
    }
    
    
    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }
    
    
    /**
     * @return int
     */
    public function getTo()
    {
        return $this->to;
    }
    
}
