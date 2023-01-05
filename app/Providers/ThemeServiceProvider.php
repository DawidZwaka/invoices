<?php

namespace App\Providers;

use Roots\Acorn\ServiceProvider;
use App\Util\InvoicesLoop;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        new InvoicesLoop();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
