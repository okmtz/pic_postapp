@extends('layouts.post')
@section('content')
    @if ($user->id == $post->user_id)
        <form method="POST" action="{{ action('PostController@edit', $post )}}">
            @csrf 
            @method('GET')
            <button type="submit">投稿の編集</button>
        </form>
        <form method="POST" action="{{ action('PostController@destroy', $post )}}">
            @csrf 
            @method('DELETE')
            <button type="submit">投稿の削除</button>
        </form>
    @endif

    <p>{{ $post->content }}</p>
    <img src="{{ asset('storage/pictures/'.$post->picture_path) }}" id="js-target" width="500" height="300">

    @foreach($replies as $reply)
        <ol>{{ $reply->content }}</ol>
    @endforeach
    <form method="POST" action="{{ action('ReplyController@store') }}">
        @csrf 
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <textarea name="content" placeholder="add reply"></textarea>
        <button type="submit">submit</button>
    </form>
    <script type="text/javascript">
        let target = document.getElementById('js-target');
            target.addEventListener('click',function(e){
                let offsetX = e.offsetX;
                let offsetY = e.offsetY;
                console.log(offsetX);
                console.log(offsetY);
            });
    </script>
@endsection
