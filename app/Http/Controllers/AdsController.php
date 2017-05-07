<?php

namespace App\Http\Controllers;

use App\Ad;
use JWTAuth;

class AdsController extends Controller {

    public function __construct() {
        $this->middleware('jwt.auth', ['only' => ['store', 'destroy']]);
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
            'title' => 'required',
            'location' => 'required',
            'image-url' => 'required',
            'want' => 'required',
            'give' => 'required',
            'body' => 'required',
        ]);

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found'], 404);
        }

        $ad = Ad::create([
            'user_id' => $user->id,
            'title' => request()->title,
            'location' => request()->location,
            'image-url' => request()['image-url'],
            'want' => request()->want,
            'give' => request()->give,
            'body' => request()->body,
        ]);

        return $ad;
    }

    public function destroy(Ad $ad) {

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found'], 404);
        }

        $ad->delete();
        return ['msg' => 'Ad successfuly delted', 'ad' => $ad];
    }
}
