<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Common\Controller;
use App\Models\User;
use App\Services\Common\MediaService;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public static function addOrUpdateProfilePicture(Request $request, $user_id)
    {
        $base64 = $request->input("base64");
        $image = MediaService::addMedia($base64, "", $user_id . "pfp");
        $user = User::findOrFail($user_id);
        $user->update(["pfp_url" => $image]);
        return ResponseTrait::responseJSON($user);
    }

    public static function addOrUpdateProfileBackground(Request $request, $user_id)
    {
        $base64 = $request->input("base64");
        $image = MediaService::addMedia($base64, "", $user_id . "pbg");
        $user = User::findOrFail($user_id);
        $user->update(["pbg_url" => $image]);
        return ResponseTrait::responseJSON($user);
    }
}
