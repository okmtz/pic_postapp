@extends('layouts.community')

@section('content')

  <a href="{{ action('CommunityController@create') }}">create</a>

  @foreach ( $communities as $community)
    <table>
      @if ($user->id == $community->user_id)
        <form method="POST" action="{{ action('CommunityController@destroy', $community) }}">
          @csrf 
          @method('DELETE')
          <button type="submit">Delete</button>
        </form>
      @endif
      <tr>{{ $community->id }}</tr>
      <td><a href="{{ action('CommunityController@show', $community->id )}}">詳細はこちら</a></td>
      <td>{{ $community->name }}</td>
    </table>
    
    
  @endforeach

@endsection