<?php

namespace SazzadBinAshique\QuickSearch;

use Illuminate\Support\ServiceProvider;
use SazzadBinAshique\QuickSearch\Facades\QuickSearchFacade;

class QuickSearchServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
       
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
    
        // Automatically apply the package configuration
        // $this->mergeConfigFrom(__DIR__.'/config/quick-search.php', 'quick-search');

       
    }
}
