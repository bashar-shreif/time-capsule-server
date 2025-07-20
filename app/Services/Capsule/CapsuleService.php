<?php

namespace App\Services\Capsule;
use App\Services\Common\MediaService;
use App\Models\Capsule;
use App\Models\Mood;
use App\Services\Location\LocationService;
use App\Services\Common\ModelService;
use App\Traits\LocationTrait;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;


class CapsuleService
{
    static function getAllOnMap()
    {
        $capsules = Capsule::all();
        return $capsules;
    }

    static function getByMood($mood_name)
    {
        $mood = Mood::where("mood", $mood_name)->first();
        return Capsule::whereBelongsTo($mood)->get();
    }
    static function getSurprise($user_id)
    {
        return Capsule::where("user_id", $user_id)
            ->where("reveal_mode_id", 2);
    }
    // static function getByCountry($country_name)
    // {
    //     $location = LocationModel::where("country_name", $country_name);
    //     return Capsule::whereBelongsTo($location)->get();
    // }
    static function getByIp($ip)
    {
        return Capsule::where('ip_address', $ip)->get();
    }
    static function getPending($user_id)
    {
        return Capsule::where("user_id", $user_id)
            ->where('revealed_at', '>=', now())
            ->get();
    }
    static function getRevealed($user_id)
    {
        return Capsule::where("user_id", $user_id)
            ->where('revealed_at', '<=', now())
            ->get();
    }

    static function createCapsule(Request $request, $id = null)
    {
        $position = LocationTrait::getLocation($request->input('ip_address'));
        $location = $position ? LocationService::addLocation($position) : null;
        $request["location_id"] = $location ? $location->id : 0;
        $capsule = Capsule::create($request->only([
            'user_id',
            'location_id',
            'privacy_settings_id',
            'reveal_mode_id',
            'mood_id',
            'message',
            'color',
            'background',
            'ip_address',
            'revealed_at'
        ]));
        $media = MediaService::addMedia($request->input('base64'), $capsule->id);

        return $capsule;
    }
    static function updateCapsule(Request $request, $id)
    {
        return Capsule::find($id)->update($request->all());
    }

    static function deleteCapsules($user_id, $id = null)
    {
        $capsule = $id ? Capsule::find($id) : null;
        if ($id)
            $capsule?->delete();
        else
            Capsule::where('user_id', $user_id)->delete();
        return $capsule;
    }
}
