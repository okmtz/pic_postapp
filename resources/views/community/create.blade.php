@extends('layouts.community')
@section('content')
    <form method="POST" action="{{ action('CommunityController@store') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <textarea name="name" placeholder="communityのタイトルを入力"></textarea>
        <button type="submit">Submit</button>
    </form>
@endsection