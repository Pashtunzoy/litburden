<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller {

    public function store() {

        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //$user = User::where('email', '=', request()->email)->first();
        $email = request()->email;
        $password = request()->password;

        if (! Auth::attempt(array('email' => $email, 'password' => $password))){
            return "Wrong Credentials";
        }

        return User::where('email', '=', request()->email)->first();
    }
}
