<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class LoginController extends Controller {

    public function store() {

        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = request()->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['msg' => 'Invalid credentials'], 401);
            }
        } catch (Exception $e) {
            return response()->json(['msg' => 'Could not create token'], 500);
        }


        return response()->json(['token' => $token]);
    }
}
