@extends('layouts.community')

@section('content')

  <a href="{{ action('CommunityController@create') }}">create</a>

  @foreach( $communities as $community)
    <table>
      <tr>{{ $community->id }}</tr>
      <td><a href="{{ action('CommunityController@show', $community->id )}}">詳細はこちら</a></td>
      <td>{{ $community->name }}</td>
    </table>
    
    
  @endforeach

@endsection