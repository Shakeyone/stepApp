@extends('layouts.layout')

@section('title', 'Edit Step Count')

@section('header', 'Edit Steps')

@section('content')

    <div class="col-sm-6 offset-sm-3">

        <form action="/steps/{{$step->id}}" method="post" id="form1">
        
            @csrf
            @method('PATCH')
    
            <div class="input-group mb-3">
                <input type="number" name="stepTotal" id="stepTotal" class="form-control" value="{{ $step->stepTotal }}">
            </div>
            
        </form>
        
        <form action="/steps/{{$step->id}}" method="post" id="form2">
        
            @csrf
            @method('DELETE')
    
            <input type="hidden" name="id" value="{{$step->id}}">
    
        </form>
    
        <form class="d-flex justify-content-around">
            <input value="Update Steps" type="button" class="btn btn-outline-warning"
                onclick="document.getElementById('form1').submit();"/>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal">
            Delete Step Entry
            </button>            
        </form>

    </div>

  
  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete step entry for {{ Date('F d,Y', strtotime($step->stepTotalDate)) }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center text-danger"><strong style="font-weight: bold">Are you sure?</strong></p>
          <p>This action can not be undone. Click the <strong style="font-weight: bold" class="text-danger">DELETE STEP ENTRY</strong> button to remove this entry or the close button or the 'X' and no 
              change to the entry will be made.
          </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form>
                <input value="Delete Step Entry" type="button" class="btn btn-danger ml-3" onclick="document.getElementById('form2').submit();"/>
            </form>
        </div>
      </div>
    </div>
  </div>

@endsection
