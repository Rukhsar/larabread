<?php

namespace Rukhsar\LaraBread;

use Rukhsar\LaraBread\Contracts\LaraBreadContract;

class LaraBread implements LaraBreadContract
{
    public function sayHello()
    {
        echo "Hello, from Larabread";
    }
}