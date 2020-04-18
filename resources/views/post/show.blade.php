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
    <img src="{{ asset('storage/pictures/'.$post->picture_path) }}" id="js-target" name="offset" width="500" height="300">

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
    <script>
        let target = document.getElementById('js-target');
            target.addEventListener('click',function(e){
                let offsetX = e.offsetX;
                let offsetY = e.offsetY;
                
                postForm(offsetX, offsetY)
            });
        function postForm(value1, value2){
            let form = document.createElement('form')
            let offsetX = document.createElement('input')
            let offsetY = document.createElement('input')
            let user_id = document.createElement('input')
            let post_id = document.createElement('input')

            form.method = 'POST'
            form.action = 'http://localhost/pic_postapp/public/picfavorite'
            
            offsetX.type = 'hidden'
            offsetX.name = 'offsetX'
            offsetX.value = value1

            offsetY.type = 'hidden'
            offsetY.name = 'offsetY'
            offsetY.value = value2

            user_id.type = 'hidden'
            user_id.name = 'user_id'
            user_id.value = {{ $user->id }}

            post_id.type = 'hidden'
            post_id.name = 'post_id'
            post_id.value = {{ $post->id }}
            
            form.appendChild(offsetX)
            form.appendChild(offsetY)
            form.appendChild(post_id)
            form.appendChild(user_id)

            document.body.appendChild(form);

            form.submit()
        }
    </script>
@endsection
