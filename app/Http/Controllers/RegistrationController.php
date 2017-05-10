<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller {

    public function store()
    {
        if (User::where('id', request()->id)) {
            return ['err' => "This user is already registered!"];
        }
        $this->validate(request(), [
            'name' => 'required|min:3|max:32',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
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
