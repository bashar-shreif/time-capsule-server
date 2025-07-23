<?php

namespace App\Http\Controllers\Capsule;
use App\Services\Location\LocationService;
use App\Services\Common\ModelService;
use App\Traits\LocationTrait;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Common\Controller;
use App\Services\Capsule\CapsuleService;
use App\Models\Capsule;


class CapsuleController extends Controller
{
    protected static string $model = Capsule::class;
    public static function getByUserId($user_id)
    {
        $pending = CapsuleService::getPending($user_id);
        $revealed = CapsuleService::getRevealed($user_id);
        return ResponseTrait::responseJSON(['pending' => $pending, 'revealed' => $revealed]);
    }
    static function getAllOnMap()
    {
        $capsules = ModelService::getAll(null, Capsule::class);
        $capsules = LocationService::attachLocations($capsules);
        return ResponseTrait::responseJSON($capsules);
    }
    public function getByMood($mood)
    {
        $capsules = CapsuleService::getByMood($mood);
        return ResponseTrait::responseJSON($capsules);
    }
    public function getByCountry($country)
    {
        $capsules = CapsuleService::getByCountry($country);
        return ResponseTrait::responseJSON($capsules);
    }
    public function getByIp($ip)
    {
        $capsules = CapsuleService::getByIp($ip);
        return ResponseTrait::responseJSON($capsules);
    }
    public function getPending($user_id)
    {
        $capsules = CapsuleService::getPending($user_id);
        return ResponseTrait::responseJSON($capsules);
    }
    public function getRevealed($user_id)
    {
        $capsules = CapsuleService::getRevealed($user_id);
        return ResponseTrait::responseJSON($capsules);
    }
    public function addOrUpdateCapsule(Request $request, $id = null)
    {
        if ($id) {
            $capsule = CapsuleService::updateCapsule($request, $id);
            return ResponseTrait::responseJSON($capsule);
        }

        $capsule = CapsuleService::createCapsule($request, $id);
        return ResponseTrait::responseJSON($capsule);
    }
    public function deleteAll($user_id, $id = null)
    {
        $deleted = CapsuleService::deleteCapsules($user_id, $id);
        return ResponseTrait::responseJSON($deleted);
    }
    public function getSurprise($user_id)
    {
        $capsules = CapsuleService::getSurprise($user_id);
        return ResponseTrait::responseJSON($capsules);
    }
}
