<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller {

    public function __construct() {
        //$this->middleware('guest', ['except' => 'destroy']);
    }

    public function create() {
        return 'login here';
    }

    public function store() {
        return 'You are signed in';
    }

    public function destroy() {
        //auth()->logout();
        return 'You are successfully logged out!';
    }
}
