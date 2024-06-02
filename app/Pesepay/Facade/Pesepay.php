<?php

namespace App\Pesepay\Facade;

use Illuminate\Support\Facades\Facade;

class Pesepay extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-pesepay';
    }
}
