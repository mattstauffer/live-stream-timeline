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

Auth::loginUsingId(1);

Route::get('/', function () {
    return view('welcome')
        ->with('posts', App\Post::all());
});


Route::get('posts/create', function () {
    return view('posts.create');
});

Route::post('posts', function (Illuminate\Http\Request $request) {
    App\Post::create($request->only(['body', 'creator']));

    return redirect('/');
});

Route::get('posts/{post}/vote/create', function (App\Post $post) {
    App\Vote::firstOrCreate(['user_id' => Auth::user()->id, 'post_id' => $post->id]);
    return redirect('/');
});

Route::get('posts/{post}/vote/delete', function (App\Post $post) {
    App\Vote::where(['user_id' => Auth::user()->id, 'post_id' => $post->id])->delete();
    return redirect('/');
});
