<?php

namespace Vendor\OnlineStore\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static float getRate(string $currency)
 */
class Currency extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'currency';
    }
}
