@extends('layouts.post')
@section('content')
    <form method="POST" action="{{ action('PostController@store') }}" enctype="multipart/form-data">
        @csrf 
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="community_id" value="{{ $community->id }}">
        <input type="file" name="pic_name">
        <textarea name="content" placeholder="コンテンツの内容を入力"></textarea>
        <button type="submit">submit</submit>
    </form>
@endsection