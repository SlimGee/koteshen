<?php

namespace App\Enum;

use Illuminate\Support\Traits\EnumeratesValues;

enum ClientType: string
{
    use EnumeratesValues;

    case INDIVIDUAL = 'individual';
    case ORGANIZATION = 'organization';
}
