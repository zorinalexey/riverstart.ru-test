<?php

namespace App\Utils\Exceptions;

use App\Utils\Enums\ErrorCodeEnum;
use Exception;

abstract class AbstractCRUDException extends Exception
{
    public function __construct(string|array $message, ErrorCodeEnum|int $code = ErrorCodeEnum::ERROR_OTHER)
    {
        if ($code instanceof ErrorCodeEnum) {
            $code = $code->value;
        }

        if (is_array($message)) {
            $message = implode(PHP_EOL, $message);
        }

        parent::__construct($message, $code);
    }
}
