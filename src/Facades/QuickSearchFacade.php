<?php

namespace SazzadBinAshique\QuickSearch\Facades;

use Illuminate\Support\Facades\Facade;

class QuickSearchFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'quick-search';
    }
}
