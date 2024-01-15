<?php

namespace App\Utils\Enums;

/**
 * @property $value
 * @property $name
 */
enum ErrorCodeEnum: int
{
    case ERROR_CREATE_RECORD = 1000;
    case ERROR_UPDATE_RECORD = 1100;
    case ERROR_DELETE_RECORD = 1200;
    case ERROR_VIEW_RECORD = 1300;
    case ERROR_OTHER = 10000;
    case PAGE_NOT_FOUND = 404;
}
