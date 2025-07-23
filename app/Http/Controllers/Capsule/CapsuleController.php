<?php

namespace App\Http\Controllers\Capsule;
use App\Services\Location\LocationService;
use App\Services\Common\ModelService;
use App\Traits\LocationTrait;
use Exception;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Common\Controller;
use App\Services\Capsule\CapsuleService;
use App\Models\Capsule;
use App\Services\Common\FilterService;

class CapsuleController extends Controller
{
    protected static string $model = Capsule::class;
    public static function getPublicWall()
    {
        try {

            $wall = CapsuleService::getPublicWall();
            return ResponseTrait::responseJSON($wall);

        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public static function getByUserId($user_id)
    {
        try {
            $pending = CapsuleService::getPending($user_id);
            $revealed = CapsuleService::getRevealed($user_id);
            return ResponseTrait::responseJSON(['pending' => $pending, 'revealed' => $revealed]);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    static function getAllOnMap()
    {
        try {
            $capsules = CapsuleService::getAllOnMap();
            return ResponseTrait::responseJSON($capsules);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public function getByMood($mood)
    {
        try {
            $capsules = CapsuleService::getByMood($mood);
            return ResponseTrait::responseJSON($capsules);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public function getByCountry($country)
    {
        try {
            $capsules = CapsuleService::getByCountry($country);
            return ResponseTrait::responseJSON($capsules);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public function getByIp($ip)
    {
        try {
            $capsules = CapsuleService::getByIp($ip);
            return ResponseTrait::responseJSON($capsules);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public function getPending($user_id)
    {
        try {
            $capsules = CapsuleService::getPending($user_id);
            return ResponseTrait::responseJSON($capsules);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public function getRevealed($user_id)
    {
        try {
            $capsules = CapsuleService::getRevealed($user_id);
            return ResponseTrait::responseJSON($capsules);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public function addOrUpdateCapsule(Request $request, $id = null)
    {
        try {
            if ($id) {
                $capsule = CapsuleService::updateCapsule($request, $id);
                return ResponseTrait::responseJSON($capsule);
            }
            $capsule = CapsuleService::createCapsule($request, $id);
            return ResponseTrait::responseJSON($capsule);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public function deleteAll($user_id, $id = null)
    {
        try {
            $deleted = CapsuleService::deleteCapsules($user_id, $id);
            return ResponseTrait::responseJSON($deleted);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }
    public function getSurprise($user_id)
    {
        try {
            $capsules = CapsuleService::getSurprise($user_id);
            return ResponseTrait::responseJSON($capsules);
        } catch (Exception $e) {
            return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
        }
    }

    public static function getFilterOptions()
{
    try {
        $filterOptions = FilterService::getFilterOptions();
        return ResponseTrait::responseJSON($filterOptions);
    } catch (Exception $e) {
        return ResponseTrait::responseJSON(null, $e->getMessage(), 500);
    }
}

}
