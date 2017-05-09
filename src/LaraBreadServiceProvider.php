<?php

namespace Rukhsar\LaraBread;

use Illuminate\Support\ServiceProvider;
use Rukhsar\LaraBread\Contracts\LaraBreadContract;

/**
 * Class LaraBreadServiceProvider
 * @package Rukhsar\LaraBread
 * @author Rukhsar Manzoor <rukhsar.man@gmail.com>
 */
class LaraBreadServiceProvider extends ServiceProvider
{
    /**
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LaraBreadContract::class, LaraBread::class);
        $this->app->alias(LaraBreadContract::class, 'larabread');
    }
}
