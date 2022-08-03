<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('tes    t')->accessToken;
            return response([
                'status' => true,
                'message' => [
                    'user' => $user,
                    'token' => $token
                ]
            ]);
        } else {
            return response('Dah lah');
            
        }
    }

    public function register(Request $request)
    {
            $validated = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required',
                'password' => 'required'
            ]);

            $validated['password'] = bcrypt($validated['password']);

            User::Create($validated);
    }
}
