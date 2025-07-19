<?php

namespace App\Traits;
use Stevebauman\Location\Facades\Location;

trait LocationTrait
{
    public static function getLocation($ip_address) {
        return Location::get($ip_address);
    }
}
