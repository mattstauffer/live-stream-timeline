@extends('layout')

@section('content')
    <a href="/">Back</a>
    <h2>Create Post</h2>

    <div class="row col-md-8 col-md-push-2">
        <div class="panel panel-default">
            <div class="panel-body">
                @include('partials.errors')

                <form method="post" action="/posts" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="body" class="col-sm-2 text-right">Body</label>
                        <div class="col-sm-10">
                            <input name="body" class="form-control" placeholder="Wow that Matt Stauffer is cool" value="{{ old('body') }}" autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="creator" class="col-sm-2 text-right">Creator</label>
                        <div class="col-sm-10">
                            <input name="creator" class="form-control" placeholder="Chris Fidao" value="{{ old('creator') }}">
                        </div>
                    </div>
                    <input type="submit" value="Create post" class="form-control btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
