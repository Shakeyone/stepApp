@extends('layouts.layout')

@section('title', 'Create Step Count')

@section('header', 'Create a new step entry.')

@section('content')

    <form action="/steps" method="POST">
        
        @csrf
        
        <div class="input-group mb-3">
            <input type="number" name="stepTotal" id="stepTotal" placeholder="Total Steps" 
                class="form-control {{$errors->has('stepTotal') ? 'border-danger' : ''}}""
                @if (old('stepTotal')>0) value="{{old('stepTotal')}}"@endif>
            <input type="hidden" name="user_id" value="1">
        </div>

        <div class="input-group mb-3">
            <button type="submit" class="btn btn-success">Add Steps</button>
        </div>

        @if($errors->any())
            <div class="validation">
                <ul class="list-group">
                    @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif

    </form>

@endsection