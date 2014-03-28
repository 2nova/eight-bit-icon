<?php

namespace Novanova\EightBitIcon\Support\Laravel;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class Facade extends IlluminateFacade
{

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'eightbiticon';
    }

}