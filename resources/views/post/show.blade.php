@extends('layouts.post')
@section('content')
    <p>{{ $post->content }}</p>
    <img src="{{ asset('storage/pictures/'.$post->picture_path) }}" width="500" height="300">
@endsection
