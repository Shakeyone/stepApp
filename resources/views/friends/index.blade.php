@extends('layouts.layout')

@section('title', 'Friends List')

@section('header', 'Friends List')

@section('content')

    @if($friends->isEmpty())
        {{ var_dump($friends)}} I suck!
    @else
        I got me some
    @endif
@endsection
