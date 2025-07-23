<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Common\Controller;
use App\Services\Common\AuthService;

class UserController extends Controller
{
    public function update(Request $request, $user_id)
    {
        $user = AuthService::updateUser($user_id, $request->all());
        return response()->json($user);
    }
}
