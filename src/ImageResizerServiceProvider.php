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
        require __DIR__ . '/Http/routes.php';

        $this->publishes([
            __DIR__. '/config/image-resizer.php' => config_path('image-resizer.php')
        ], 'config');
        $this->publishes([
            __DIR__ . '/Facades' => app_path('Helpers/'),
        ], 'helpers');
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
