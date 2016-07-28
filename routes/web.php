<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

if (! App::runningInConsole()) {
    Auth::loginUsingId(1);
}

Route::get('/', function () {
    return view('welcome')
        ->with('posts', App\Post::all());
});


Route::get('posts/create', function () {
    return view('posts.create');
});

Route::post('posts', 'PostsController@store');

Route::get('posts/{post}/like/create', function (App\Post $post) {
    App\Like::firstOrCreate(['user_id' => Auth::user()->id, 'post_id' => $post->id]);
    return redirect('/');
});

Route::get('posts/{post}/like/delete', function (App\Post $post) {
    App\Like::where(['user_id' => Auth::user()->id, 'post_id' => $post->id])->delete();
    return redirect('/');
});
