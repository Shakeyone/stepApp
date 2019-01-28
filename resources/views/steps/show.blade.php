@extends('layouts.layout')

@section('content')

    <h1 class="m-5">Step entry for {{ date('M d Y', strtotime($steps->created_at)) }}</h1>

    <p>
        Steps: {{$steps->stepTotal}}
    </p>

    <p>
        <a href="/steps/{{$steps->id}}/edit">Edit</a>
    </p>

@endsection