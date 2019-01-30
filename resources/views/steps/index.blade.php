@extends('layouts.layout')

@section('title', 'Step Counts')

@section('header', 'Step Counts')

@section('content')

    <div class="list-group">
        @foreach ($steps as $step)
            <a class="list-group-item list-group-item-action" href="/steps/{{$step->id}}">
                Date: {{ date('M d Y', strtotime($step->stepTotalDate)) }} - Steps: {{$step->stepTotal}}
            </a> 
        @endforeach
    </div>

@endsection