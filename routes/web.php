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

Route::get('/', function () {
    return view('welcome')
        ->with('posts', App\Post::all());
});

Route::get('posts/create', function () {
    return view('posts.create');
});

Route::post('posts', function (Illuminate\Http\Request $request) {
    App\Post::create(['body' => $request->input('body')]);

    return redirect('/');
});
