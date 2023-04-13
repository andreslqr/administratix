<?php

namespace Administratix\Administratix\Exceptions;

use InvalidArgumentException;

class JsWidgetDoesNotImplementsOption extends InvalidArgumentException
{
    /**
     * The constructor of the class
     * 
     * @param  string $filename
     * @return void
     */
    public function __construct($property)
    {
        return parent::__construct("The property {$property} is not available in this js Widget");
    }
}