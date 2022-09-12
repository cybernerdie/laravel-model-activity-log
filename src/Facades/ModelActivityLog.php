<?php

namespace Cybernerdie\ModelActivityLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Cybernerdie\ModelActivityLog\ModelActivityLog
 */
class ModelActivityLog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Cybernerdie\ModelActivityLog\ModelActivityLog::class;
    }
}
