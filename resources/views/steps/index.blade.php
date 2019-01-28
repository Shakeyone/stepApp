@extends('layouts.layout')

@section('content')

    <h1>Steps</h1>
    <ul>
        @foreach ($steps as $step)
            <li>
                <a href="/steps/{{$step->id}}">
                    Added on: {{ date('M d Y', strtotime($step->created_at)) }} - Steps: {{$step->stepTotal}}
                </a>
            </li>   
        @endforeach
    </ul>

@endsection