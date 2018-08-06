<?php

namespace Ephenodrom\Exceptions;

use \Exception;

class RestExecutionException extends Exception
{

    public $apiErrorCode;

    /**
     * Create a new RestExecution exception.
     *
     * @param  string  $message
     * @return void
     */
    public function __construct($message = 'Execution failed.', $errorCode = null, $object = null, $stid = null)
    {
        if($errorCode != null){
            $this->apiErrorCode = $errorCode;
            $message .= "[Code=$errorCode]";
        }
        if($object != null){
            $message .= "[Object=$object]";
        }
        if($stid != null){
            $message .= "[STID=$stid]";
        }
        parent::__construct($message);
    }
}
