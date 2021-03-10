<?php

namespace App\Exceptions;

use Exception;

class InvalidInputException extends Exception
{
    public function __construct ( string $message = "" , int $code, $brand){
        $message = "$message $brand";
        return parent::__construct($message, $code);
    }
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response(['code'=>$this->getCode(),'title'=>'Error de tipo :('
                        ,'message'=>$this->getMessage()], 422);
    }
}