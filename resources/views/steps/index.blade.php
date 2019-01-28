@extends('layouts.layout')

@section('title', 'Step Counts')

@section('header', 'Step Counts')

@section('content')

    <div class="list-group">
        @foreach ($steps as $step)
            <a class="list-group-item list-group-item-action" href="/steps/{{$step->id}}">
                Added on: {{ date('M d Y', strtotime($step->created_at)) }} - Steps: {{$step->stepTotal}}
            </a> 
        @endforeach
    </div>

@endsection