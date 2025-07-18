<?php

namespace App\Services\Capsule;
use App\Models\Capsule;
use App\Services\ModelService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;


class CapsuleService
{

    static function createOrUpdateCapsule(Request $request, $id = null)
    {
        $capsule = new Capsule();

        $id = isset($_POST["id"]) ? (int) $_POST["id"] : null;

        $capsule = $id ? Capsule::where('id', $id)->update($request->all()) :
            Capsule::create($request->all());

        return ResponseTrait::responseJSON($capsule);
    }

    static function deleteCapsules($user_id, $id = null)
    {
        $capsule = $id ? Capsule::find($id) : null;
        if($id)
            $capsule?->delete();
        else
            Capsule::where('user_id', $user_id)->delete();
        return $capsule;
    }
}
