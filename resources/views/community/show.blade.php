@extends('layouts.community')
@section('content')
    @foreach($posts as $post)
        <table>
            <tr>コンテンツ名</tr>
            <td><a href="{{ action('PostController@show', $post->id )}}">投稿の詳細へ移動</a> | </td>
            <td>{{ $post->content }}</td>
        </table>
    @endforeach
@endsection