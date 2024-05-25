<?php

namespace App\Aux;

use Illuminate\Support\Facades\Http;
use Opcodes\LogViewer\Facades\Cache;

class ExchageRates
{
    private $baseCurrency = 'USD';

    private $baseUrl = 'https://v6.exchangerate-api.com/v6/3196767c8afda68c1b087aa4/latest';

    public function __construct()
    {
        $this->baseUrl = $this->baseUrl . '/' . $this->baseCurrency;
    }

    public function against(string $currency): float
    {
        $rates = Cache::remember('exchange-rates-key', 60 * 60 * 24 * 7, function () {
            return Http::get($this->baseUrl)->json();
        });

        return round($rates['conversion_rates'][$currency], 2);
    }
}
