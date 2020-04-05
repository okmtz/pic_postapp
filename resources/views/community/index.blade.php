@extends('layouts/comunity')

@section('content')

  <a href="{{ action('ComunityController@create') }}">create</a>

  @foreach( $comunities as $comunity)
    <p>{{ $comunity->id }}</p>
    <p>{{ $comunity->name }}</p>
  @endforeach

@endsection