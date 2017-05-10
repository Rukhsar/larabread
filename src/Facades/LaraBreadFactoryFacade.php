<?php

namespace Rukhsar\LaraBread\Facades;

use Illuminate\Support\Facades\Facade;

class LaraBreadFactoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'larabreadfactory';
    }
}