<?php

namespace Rukhsar\LaraBread\Facades;

use Illuminate\Support\Facades\Facade;

class LaraBreadFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'larabread';
    }
}