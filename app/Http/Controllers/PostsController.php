<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class PostsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
            'creator' => 'required'
        ]);

        Post::create($request->only(['body', 'creator']));

        return redirect('/');
    }
}
