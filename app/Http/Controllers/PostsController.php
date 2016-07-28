<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Conference;
use App\Post;

class PostsController extends Controller
{
    public function create(Conference $conference)
    {
        return view('posts.create')
            ->with('conference', $conference);
    }

    public function store(Conference $conference, Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:255',
            'creator' => 'required'
        ]);

        $conference->posts()->create(
            $request->only(['body', 'creator'])
        );

        return redirect('/' . $conference->slug);
    }
}
