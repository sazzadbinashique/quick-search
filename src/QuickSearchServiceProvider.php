<?php

namespace QuickSearch;

use Illuminate\Support\ServiceProvider;
use QuickSearch\Facades\QuickSearchFacade;

class QuickSearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // how to Triats publish
        $this->publishes([
            __DIR__.'/Traits' => app_path('Traits'),
        ], 'quick-search');


    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('quick-search', function ($app) {
            return new QuickSearchFacade();
        });
    }
}
