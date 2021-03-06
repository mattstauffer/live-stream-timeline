@extends('layout')

@section('content')
    <h2>{{ $conference->slug }} Timeline</h2>

    <a href="/{{ $conference->slug }}/posts/create" class="pull-right btn btn-primary">
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Create new post
    </a>

    <ul class="timeline">
    @forelse($posts as $post)
        <li class="timeline__post">
            <div style="font-size: {{ $posts->max('likesCount') == 0 ? 1 : ($post->likesCount / $posts->max('likesCount')) + 1 }}em">
                <span class="post__body">"{{ $post->body }}"</span><br>
                <span class="post__creator">- {{ $post->creator }}</span>
            </div>
            <div class="post__meta">
                {{ $post->created_at->format('g:ia') }}<br>

                @if (Auth::user()->likes()->where('post_id', $post->id)->count() == 0)
                    <a href="/{{ $conference->slug }}/posts/{{ $post->id }}/like/create" class="like-button">
                        <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
                    </a>
                @else
                    <a href=/"{{ $conference->slug }}/posts/{{ $post->id }}/like/delete" class="like-button">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                    </a>
                @endif
                {{ $post->likesCount }}
            </div>
        </li>
    @empty
        <li style="margin-top: 3em;">No posts yet!</li>
    @endforelse
    </ul>

    <br><br><br><br><br>
    <hr>
    @if (Auth::check())
        You are logged in in as {{ Auth::user()->name }}.
    @endif
@endsection('content')
