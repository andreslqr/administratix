<?php

namespace Administratix\Administratix\Exceptions;

use LogicException;

class PropertyIsNotDefined extends LogicException
{
    /**
     * Constructor of the class
     * 
     * @param $variableName
     */
    public function __construct($variableName)
    {
        parent::__construct("The property {$variableName} was not defined");  
    }
}