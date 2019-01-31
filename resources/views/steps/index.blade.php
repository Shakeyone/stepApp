@extends('layouts.layout')

@section('title', 'Step Counts')

@section('header', 'Step Counts')

@section('content')

    <div class="col-sm-6 offset-sm-3">
        @foreach($users as $user)
        <h1>{{$user->name}}</h1>
            <div class="list-group mb-5">
                @foreach ($user->steps->sortByDesc('stepTotalDate') as $step)
                    <a class="list-group-item list-group-item-action" href="/steps/{{$step->id}}">
                        Date: {{ date('M d Y', strtotime($step->stepTotalDate)) }} - Steps: {{$step->stepTotal}}
                    </a> 
                @endforeach
            </div>
        @endforeach
    </div>

@endsection