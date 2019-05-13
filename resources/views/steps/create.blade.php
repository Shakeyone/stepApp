@extends('layouts.layout')

@section('title', 'Create Step Count')

@section('header', 'Create a new step entry.')

@section('content')

    <div class="col-sm-6 offset-sm-3">

        <form action="/steps" method="POST">
            
            @csrf
            
            <div class="input-group mb-3">
                <input type="number" name="stepTotal" id="stepTotal" placeholder="Total Steps" 
                    class="form-control {{$errors->has('stepTotal') ? 'border-danger' : ''}}"
                    @if (old('stepTotal')>0) value="{{old('stepTotal')}}"@endif>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            </div>
    
            <div class="input-group mb-3">
                <input type="date" name="stepTotalDate" id="stepTotalDate"
                class="form-control" @if (old('stepTotalDate')>0) value="{{old('stepTotalDate')}}"@endif>
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

    </div>

@endsection
