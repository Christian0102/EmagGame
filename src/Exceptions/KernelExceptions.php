<?php

declare(strict_types=1);

namespace EmagGame\Exceptions;

use Exception;
use Throwable;

final class KernelExceptions extends Exception
{
    protected $message = 'Kernel Exception : ';

    public function __construct(int $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ":[{$this->code}]: {$this->message} \n";
    }
}
