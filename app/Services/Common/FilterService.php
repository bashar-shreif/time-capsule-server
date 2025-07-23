<?php

namespace App\Services\Common;

use App\Models\Mood;
use App\Models\LocationModel;

class FilterService
{
    static function getFilterOptions()
    {
        $moods = self::getMoods();
        $locations = self::getLocations();
        
        return [
            'moods' => $moods,
            'locations' => $locations
        ];
    }
    
    static function getMoods()
    {
        return Mood::select('id', 'mood')
            ->orderBy('mood', 'asc')
            ->get();
    }
    
    static function getLocations()
    {
        $countries = LocationModel::select('country_name', 'country_code')
            ->whereNotNull('country_name')
            ->distinct()
            ->orderBy('country_name', 'asc')
            ->get();
            
        $cities = LocationModel::select('city_name', 'country_name')
            ->whereNotNull('city_name')
            ->whereNotNull('country_name')
            ->distinct()
            ->orderBy('country_name', 'asc')
            ->orderBy('city_name', 'asc')
            ->get()
            ->groupBy('country_name');
            
        return [
            'countries' => $countries,
            'cities' => $cities
        ];
    }
}