<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Capsule;


class LocationModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'ip',
        'country_name',
        'country_code',
        'region_code',
        'region_name',
        'city_name',
        'zip_code',
        'iso_code',
        'latitude',
        'longitude',
        'metro_code',
        'area_code',
        'timezone',
    ];
    public function capsules()
    {
        return $this->hasMany(Capsule::class);
    }
}
