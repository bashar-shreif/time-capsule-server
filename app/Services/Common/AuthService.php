<?php

namespace App\Services\Common;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthService
{
    static function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = Auth::login($user);

        $user->token = $token;
        return $user;
    }
    static function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('username', 'password');

        $token = Auth::attempt($credentials);
        if (!$token)
            return null;

        $user = Auth::user();
        $user->token = $token;
        return $user;
    }

    public static function updateUser($user_id, $data)
    {
        $user = \App\Models\User::findOrFail($user_id);
        if (isset($data['name'])) {
            $user->name = $data['name'];
        }
        if (isset($data['pfp_url'])) {
            $user->pfp_url = $data['pfp_url'];
        }
        if (isset($data['pbg_url'])) {
            $user->pbg_url = $data['pbg_url'];
        }
        $user->save();
        return $user;
    }
}

