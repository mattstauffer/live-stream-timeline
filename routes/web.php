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
        ->with('conferences', App\Conference::all());
});

Route::group(['prefix' => '{conference}'], function () {
    Route::get('/', function (App\Conference $conference) {
        return view('posts.index')
            ->with('posts', $conference->posts)
            ->with('conference', $conference);
    });

    Route::group(['prefix' => 'posts'], function () {
        Route::get('create', 'PostsController@create');
        Route::post('/', 'PostsController@store');

        Route::get('{post}/like/create', function (App\Conference $conference, App\Post $post) {
            App\Like::firstOrCreate(['user_id' => Auth::user()->id, 'post_id' => $post->id]);
            return redirect('/' . $conference->slug);
        });

        Route::get('{post}/like/delete', function (App\Conference $conference, App\Post $post) {
            App\Like::where(['user_id' => Auth::user()->id, 'post_id' => $post->id])->delete();
            return redirect('/' . $conference->slug);
        });
    });

});
