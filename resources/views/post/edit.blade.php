@extends('layouts.post')
@section('content')
    <form method="POST" action="{{ action('PostController@update', $post) }}">
        @csrf 
        @method('PUT')
        <input type="hidden" name="user_id" value="{{ $post->user_id }}">
        <input type="hidden" name="community_id" value="{{ $post->community_id }}">
        <textarea name="content">{{ old('content') ?: $post->content}}</textarea>
        <button type="submit">submit</submit>
    </form>
@endsection