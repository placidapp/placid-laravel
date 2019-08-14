<?php

namespace Placid\Laravel;

use Illuminate\Support\Facades\Facade;

class PlacidFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'placid';
    }
}
