<?php

namespace App\Facades\Aux;

use Illuminate\Support\Facades\Facade;

class ExchangeRates extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exchange-rates';
    }
}
