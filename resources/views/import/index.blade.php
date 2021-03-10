@extends('layouts.layout')

@section('title', 'Import Steps')

@section('header', 'Import from Apple Health Kit')

@section('content')
<div class="col-6 mx-auto">
    <form method="POST" action="import" enctype="multipart/form-data">
        @csrf
        <h3 class="text-center">Select the range to import.</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="importRange" id="inlineRadio1" value="month" checked>
            <label class="form-check-label" for="inlineRadio1">Month</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="importRange" id="inlineRadio2" value="year">
            <label class="form-check-label" for="inlineRadio2">Year</label>
            </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="importRange" id="inlineRadio3" value="all">
            <label class="form-check-label" for="inlineRadio3">All</label>
        </div>
        <div class="form-group my-3">
            <label for="exampleFormControlFile1">Health Kit Export</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="export">
        </div>

        <div>
            <button type="submit" class="btn btn-outline-info">Upload</button>
        </div>
    </form>
</div>
@endsection
