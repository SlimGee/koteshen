<?php

namespace App\Services;

use App\Models\Business;

class PrimaryBusiness
{
    private static $instance;

    public static function get()
    {
        if (!self::$instance) {
            $business = Business::where('is_primary', true)->first();
            self::$instance = $business;
        }

        return self::$instance;
    }
}
