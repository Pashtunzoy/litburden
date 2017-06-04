<?php

namespace App\Http\Controllers;

use App\Ad;
use JWTAuth;

class AdsController extends Controller {

    public function __construct() {
        $this->middleware('jwt.auth', ['except' => ['index', 'show', 'search']]);
    }

    public function index () {
        $ads = Ad::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return $ads;
    }


    public function show (Ad $ad) {
        if (! $ad) {
            return ['msg' => 'Sorry Wrong Path'];
        }
        return $ad;
    }

    public function search () {
        return Ad::search(request()->search)->get();
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



    public function update($id) {
        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found'], 404);
        }
        $ad = Ad::find($id);
        if ($ad->user_id == $user->id) {
            $ad->update([
                'user_id' => $user->id,
                'title' => request()->title,
                'location' => request()->location,
                'image-url' => request()['image-url'],
                'want' => request()->want,
                'give' => request()->give,
                'body' => request()->body,
            ]);
            return response()->json($ad);
        }

        return response()->json(['msg' => 'Sorry You Are In The Wrong Place']);

    }



    public function destroy(Ad $ad) {

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['msg' => 'User not found'], 404);
        }

        if ($ad->user_id == $user->id) {
            $ad->delete();
            return response()->json(['msg' => 'Advert successfuly deleted']);
        }
        return response()->json(['msg' => 'Nothing can be found here']);
    }

}
