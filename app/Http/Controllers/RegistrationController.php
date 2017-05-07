<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller {

    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required'
        ]);

        $user = User::create([
                'name' => request()->name,
                'email' => strtolower(request()->email),
                'password' => bcrypt(request()->password)
        ]);

        return $user;
    }
}
