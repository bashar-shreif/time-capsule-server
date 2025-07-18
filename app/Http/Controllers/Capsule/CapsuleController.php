<?php

namespace App\Http\Controllers\Capsule;
use App\Services\ModelService;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Services\Capsule\CapsuleService;
use App\Models\Capsule;


class CapsuleController extends Controller
{
    protected static string $model = Capsule::class;
    protected static array $defaults = [];

    public static function getByUserId($user_id)
    {
        $capsules = Capsule::where("user_id", $user_id)->get();
        return ResponseTrait::responseJSON($capsules);
    }

    public function getByMoodId($mood_id)
    {
        $capsules = Capsule::where("mood_id", $mood_id)->get();
        return ResponseTrait::responseJSON($capsules);
    }

    public function getByCountryId($country_id)
    {
        $capsules = Capsule::where("country_id", $country_id)->get();
        return ResponseTrait::responseJSON($capsules);
    }


    public function getPending($user_id)
    {
        $capsules = Capsule::where("user_id", $user_id)
            ->where('revealed_at', '>=', now())
            ->get();

        return ResponseTrait::responseJSON($capsules);
    }


    public function getRevealed($user_id)
    {
        $capsules = Capsule::where("user_id", $user_id)
            ->where('revealed_at', '<=', now())
            ->get();

        return ResponseTrait::responseJSON($capsules);
    }


    public function addOrUpdateCapsule(Request $request, $id = null)
    {
        return CapsuleService::createOrUpdateCapsule($request, $id);
    }

    public function deleteAll($user_id, $id = null)
    {
        $deleted = CapsuleService::deleteCapsules($user_id, $id);
        return ResponseTrait::responseJSON($deleted);
    }
}
