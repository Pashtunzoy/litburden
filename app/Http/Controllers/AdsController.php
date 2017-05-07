<?php

namespace App\Http\Controllers;

use App\Ad;


class AdsController extends Controller {

    public function __construct() {
        //$this->middleware('auth')->except(['index', 'show']);
    }

    public function index () {
        $ads = Ad::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return $ads;
    }


    public function show (Ad $ad) {
        if (! $ad) {
            return ['msg' => 'No Ad with the ID'];
        }
        return $ad;
    }

    public function store() {
          $this->validate(request(), [
            'user_id' => 'required',
            'title' => 'required',
            'location' => 'required',
            'image-url' => 'required',
            'want' => 'required',
            'give' => 'required',
            'body' => 'required',
        ]);

        //dd(request(['title', 'location', 'image-url', 'want', 'give', 'body']));

        $ad = Ad::create(request(['user_id', 'title', 'location', 'image-url', 'want', 'give', 'body']));

      //$this->flash('Your ad was published!');

      return $ad;
  }
}
