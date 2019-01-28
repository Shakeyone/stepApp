@extends('layouts.layout')

@section('title', 'Edit Step Count')

@section('header', 'Edit Steps')

@section('content')

    <form action="/steps/{{$steps->id}}" method="post" id="form1">
    
        @csrf
        @method('PATCH')

        <div class="input-group mb-3">
            <input type="number" name="stepTotal" id="stepTotal" class="form-control" value="{{ $steps->stepTotal }}">
        </div>
        
    </form>
    
    <form action="/steps/{{$steps->id}}" method="post" id="form2">
    
        @csrf
        @method('DELETE')

        <input type="hidden" name="id" value="{{$steps->id}}">

    </form>

    <form>
        <input value="Update Steps" type="button" class="btn btn-warning"
            onclick="document.getElementById('form1').submit();"/>
        <input value="Delete Steps Entry" type="button" class="btn btn-danger ml-3"
            onclick="document.getElementById('form2').submit();"/>
    </form>

@endsection