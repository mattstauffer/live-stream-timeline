<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Posts</title>

        <!-- Styles -->
        <style>
            html {
                box-sizing: border-box;
            }

            *, *:before, *:after {
                box-sizing: inherit;
            }

            html, body {
                background-color: #fff;
                color: #636b6f;
                height: 100vh;
                margin: 0;
                padding: 10px;
            }

            .content {
                margin: 0 auto;
                max-width: 800px;
                text-align: center;
            }

            .title {
                font-size: 3rem;
            }

            .timeline {
                border-left: 1px solid #333;
                list-style-type: none;
                padding-left: 2rem;
            }

                .timeline__post {
                    border: 1px solid #ddd;
                    margin-bottom: 1em;
                    padding: 1em;
                    position: relative;
                }

                .timeline__post::after {
                    border-top: 1px solid #444;
                    content: "";
                    display: block;
                    height: 1em;
                    left: calc(-2rem - 1px);
                    position: absolute;
                    top: 50%;
                    width: 2rem;
                }
        </style>
    </head>
    <body>
        <div class="content">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Posts 
                </div>

                <a href="/posts/create">Create new post</a>

                <ul class="timeline">
                @foreach ($posts as $post)
                    <li class="timeline__post">
                        <div style="font-size: {{ ($post->votesCount / $posts->max('votesCount')) + 1 }}em">
                            "{{ $post->body }}" - {{ $post->creator }} [{{ $post->votesCount }}]
                            @if (Auth::user()->votes()->where('post_id', $post->id)->count() == 0)
                            <a href="/posts/{{ $post->id }}/vote/create">Vote</a>
                            @else
                            <a href="/posts/{{ $post->id }}/vote/delete">Un-Vote</a>
                            @endif
                        </div>
                    </li>
                @endforeach
                </ul>

                <br><br><br><br><br>
                <hr>
                @if (Auth::check())
                    You are logged in in as {{ Auth::user()->name }}.
                @endif
            </div>
        </div>
    </body>
</html>
