<?php

namespace App\Http\Controllers;


class RegistrationController extends Controller {

    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function create()
    {
        return 'You are registered';
    }

    public function store()
    {
        return 'your account is saved';
    }
}
