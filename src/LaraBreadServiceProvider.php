<?php

namespace Rukhsar\LaraBread;

use Illuminate\Support\ServiceProvider;
use Rukhsar\LaraBread\Contracts\LaraBreadContract;
use Rukhsar\LaraBread\Contracts\LaraBreadFactoryContract;
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
        $viewPath = __DIR__. '/../../resources/views';

        $this->loadViewsFrom($viewPath, 'larabread');

        $this->publishes([
            $viewPath => resource_path('views\vendor\larabread'),
        ]);
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
        $this->app->singleton(LaraBreadFactoryContract::class, LaraBreadFactory::class);
        $this->app->alias(LaraBreadFactoryContract::class, 'larabreadfactory');
    }
}
