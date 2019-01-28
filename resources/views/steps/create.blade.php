@extends('layouts.layout')

@section('title', 'Create Step Count')

@section('header', 'Create a new step entry.')

@section('content')

    <form action="/steps" method="POST">
        
        @csrf
        
        <div class="input-group mb-3">
            <input type="number" name="stepTotal" id="stepTotal" placeholder="Total Steps" class="form-control">
        </div>

        <div>
            <input type="hidden" name="user_id" value="1">
        </div>

        <div class="input-group mb-3">
            <button type="submit" class="btn btn-success">Add Steps</button>
        </div>
    </form>

@endsection