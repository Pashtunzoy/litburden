<?php

namespace App\Http\Controllers;

use App\Post;


class PostsController extends Controller {

    public function __construct() {
        //$this->middleware('auth')->except(['index', 'show']);
    }

    public function index () {
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return $posts;
    }


    public function show (Post $post) {
        if (! $post) {
            return ['msg' => 'No Post with the ID'];
        }
        return $post;
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

        $post = Post::create(request(['user_id', 'title', 'location', 'image-url', 'want', 'give', 'body']));

      //$this->flash('Your post was published!');

      return $post;
  }
}
