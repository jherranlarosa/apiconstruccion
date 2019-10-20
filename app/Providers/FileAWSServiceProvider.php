<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FileAWSServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        require_once app_path() . '/Helpers/File/FileHelper.php';

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
