<?php

namespace Administratix\Administratix\Exceptions;

use InvalidArgumentException; 

class JsWidgetDoesNotImplementsEvent extends InvalidArgumentException
{
    /**
     * The constructor of the class
     * 
     * @param  string $filename
     * @return void
     */
    public function __construct($event)
    {
        return parent::__construct("The event {$event} is not available in this js Widget");
    }
}