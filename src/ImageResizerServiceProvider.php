<?php

namespace EmilZhivkov\ImageResizer;

use Illuminate\Support\ServiceProvider;

class ImageResizerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {


        $this->publishes([
            __DIR__. '/config/image-resizer.php' => config_path('image-resizer.php')
        ], 'config');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
