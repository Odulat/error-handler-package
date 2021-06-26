<?php

namespace Dulat\ErrorHandler\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class ErrorHandler
 *
 * @package Dulat\ErrorHandler\Facades
 *
 * @method static void captureException($exception)
 */
class ErrorHandler extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'error-handler';
    }
}