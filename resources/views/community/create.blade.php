@extends('layouts.comunity')
@section('content')
    <form method="POST" action="{{ action('ComunityController@store') }}">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <textarea name="name" placeholder="comunityのタイトルを入力"></textarea>
        <button type="submit">Submit</button>
    </form>
@endsection