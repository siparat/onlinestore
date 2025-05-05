<?php

namespace Vendor\OnlineStore\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static float calculate(string $from, string $to, string $provider = 'google')
 */
class Delivery extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'delivery';
    }
}
