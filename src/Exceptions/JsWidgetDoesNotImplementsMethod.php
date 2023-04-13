<?php

namespace Administratix\Administratix\Exceptions;

use InvalidArgumentException; 

class JsWidgetDoesNotImplementsMethod extends InvalidArgumentException
{
    /**
     * The constructor of the class
     * 
     * @param  string $filename
     * @return void
     */
    public function __construct($method)
    {
        return parent::__construct("The method {$method} is not available in this js Widget");
    }
}