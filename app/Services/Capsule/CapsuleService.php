<?php

namespace App\Services\Capsule;
use App\Models\Capsule;
use App\Models\Mood;
use App\Services\ModelService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;


class CapsuleService
{

    static function getByMood($mood_name)
    {
        $mood = Mood::where("mood", $mood_name)->first();
        return Capsule::whereBelongsTo($mood)->get();
    }
    static function getByCountry($country_name)
    {
        $country = Mood::where("country", $country_name)->first();
        return Capsule::whereBelongsTo($country)->get();
    }
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

    static function createOrUpdateCapsule(Request $request, $id = null)
    {
        $mood = Mood::where('mood', $request["mood"])->first();
        $request['mood_id'] = $mood->id;
        $capsule = $id ? Capsule::find($id)->update($request->all()) :
            Capsule::create($request->all());
        return $capsule;
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
