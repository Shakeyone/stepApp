@extends('layouts.layout')

@section('title', 'Step Entry')

@section('header')
    Step entry for {{ date('M d Y', strtotime($step->stepTotalDate)) }}
@endsection

@section('content')

    <p>
        Steps: {{$step->stepTotal}}
    </p>

    <p>
        <a href="/steps/{{$step->id}}/edit" class="btn btn-warning">Edit</a>
    </p>

@endsection