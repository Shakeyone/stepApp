@extends('layouts.layout')

@section('title', 'Step Entry')

@section('header')
    Step entry 
@endsection

@section('content')

    <div class="col-sm-6 offset-sm-3">
        <div class="card text-center">
            <div class="card-header">
                {{ date('M d Y', strtotime($step->stepTotalDate)) }}
            </div>
            <div class="card-body">
                <h5 class="card-title">User: {{$step->user->name}}</h5>
                <p class="card-text">Steps: {{$step->stepTotal}}</p>
                <a href="/steps/{{$step->id}}/edit" class="btn btn-warning">Edit</a>
            </div>
            <div class="card-footer text-muted">
                Last Updated: {{ date_diff(new Datetime('now'), $step->updated_at)->format('%d days ago')}}
            </div>
        </div>
    </div>

@endsection