<?php

namespace Administratix\Administratix\Exceptions;

use InvalidArgumentException;

class FileDoesNotExists extends InvalidArgumentException
{
    /**
     * The constructor of the class
     * 
     * @param  string $filename
     * @return void
     */
    public function __construct($filename)
    {
        return parent::__construct("The file {$filename} was not found");
    }
}