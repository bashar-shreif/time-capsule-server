<?php

namespace App\Services\Location;


use App\Models\Location;

class LocationService
{
    public static function addLocation(Location $location)
    {
        Location::create([$location->toArray()]);
    }
}
