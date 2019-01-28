@extends('layouts.layout')

@section('title', 'Step Entry')

@section('header')
    Step entry for {{ date('M d Y', strtotime($steps->created_at)) }}
@endsection

@section('content')

    <p>
        Steps: {{$steps->stepTotal}}
    </p>

    <p>
        <a href="/steps/{{$steps->id}}/edit" class="btn btn-warning">Edit</a>
    </p>

@endsection