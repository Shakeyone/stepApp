@extends('layouts.layout')

@section('content')

    <h1>Edit Steps</h1>

    <form action="/steps/{{$steps->id}}" method="post">
    
        @csrf
        @method('PATCH')

        <div class="input-group mb-3">
            <input type="number" name="stepTotal" id="stepTotal" class="form-control" value="{{ $steps->stepTotal }}">
        </div>
        
        <div class="input-group">
            <button type="submit" class="btn btn-primary">Add Steps</button>
            <form action="/steps/{{$steps->id}}" method="post">
            
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{$steps->id}}">
                <button type="submit" class="btn btn-danger ml-3">Delete Steps Entry</button>
            </form>
        </div>    
    
    </form>

@endsection