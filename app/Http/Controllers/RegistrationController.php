<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller {

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::create([
                'name' => request()->name,
                'email' => strtolower(request()->email),
                'password' => bcrypt(request()->password)
        ]);

        return [
            'msg' => 'registerd',
            'user' => $user
        ];
    }
}
