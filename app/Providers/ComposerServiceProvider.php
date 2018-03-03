<?php

namespace App\Providers;

use App\ViewComposers\BrandComposer;
use App\ViewComposers\CategoryComposer;
use App\ViewComposers\ProductComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.product.sidebar'], BrandComposer::class);
        View::composer(['layouts.product.sidebar'], CategoryComposer::class);
        View::composer(['layouts.product.featured'], ProductComposer::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
