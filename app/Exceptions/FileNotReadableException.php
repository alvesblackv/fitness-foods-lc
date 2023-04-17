<?php

namespace App\Exceptions;

use Exception;

class FileNotReadableException extends Exception
{
    public function __construct(string $fileName)
    {
        parent::__construct("Ops! O arquivo $fileName não é legível para leitura!");
    }
}
