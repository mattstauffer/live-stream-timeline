@extends('layout')

@section('content')
    <h2>Conferences</h2>
    <ul>
    @foreach ($conferences as $conference)
        <li><a href="/{{ $conference->slug }}/">{{ $conference->slug }}</a></li>
    @endforeach
    </ul>
@endsection
