<?php 

namespace Novanova\EightBitIcon\Facades;

use Illuminate\Support\Facades\Facade;

class EightBitIcon extends Facade
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