<?php

namespace Rukhsar\LaraBread;
use Rukhsar\LaraBread\Contracts\LaraBreadFactoryContract;

class LaraBreadFactory implements LaraBreadFactoryContract
{
    public function sayFactory()
    {
        echo "I'm a Factory Object";
    }
}