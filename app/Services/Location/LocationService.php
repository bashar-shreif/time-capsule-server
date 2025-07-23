<?php

namespace App\Services\Location;
use Stevebauman\Location\Facades\Location;

use App\Models\LocationModel;

class LocationService
{
    public static function addLocation($position)
    {
        return LocationModel::create([
            'country_name' => $position->countryName,
            'country_code' => $position->countryCode,
            'region_code' => $position->regionCode,
            'region_name' => $position->regionName,
            'city_name' => $position->cityName,
            'zip_code' => $position->zipCode,
            'iso_code' => $position->isoCode,
            'latitude' => $position->latitude,
            'longitude' => $position->longitude,
            'metro_code' => $position->metroCode,
            'area_code' => $position->areaCode,
            'timezone' => $position->timezone,
        ]);
    }
    public static function attachLocations($capsules)
    {
        foreach ($capsules as $capsule)
            $capsule["location"] = $capsule->location();
        return $capsules;
    }

}
