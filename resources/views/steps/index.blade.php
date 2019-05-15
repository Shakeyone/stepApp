@extends('layouts.layout')

@section('title', 'Step Counts')

@section('header', 'Step Counts')

@section('content')
<?php
$order = isset($_GET['order']) ? $_GET['order'] : '';
$by = isset($_GET['by']) ? $_GET['by'] : '';
?>
    <div class="col-sm-10 offset-sm-1">
        <form action="" method="get">
            <div class="row mb-3">
                <div class="col-5">
                    <select name="by" id="by" class="form-control">
                        <option value="date" <?=$by =='date' ? 'selected' : '' ?>>Date</option>
                        <option value="steps" <?=$by =='steps' ? 'selected' : '' ?>>Steps</option>
                    </select>
                </div>
                <div class="col-5">
                    <select name="order" id="order" class="form-control">
                        <option value="asc" <?=$order =='asc' ? 'selected' : '' ?>>ASC</option>
                        <option value="desc" <?=$order =='desc' || $order == '' ? 'selected' : '' ?>>DESC</option>
                    </select>
                </div>
                <div class="col-2">
                    <input type="submit" value="Sort" class="btn btn-outline-success">
                </div>
            </div>
        </form>
        <div class="row">
        @foreach($users as $user)
            <div class="col-6">
                <h1 class="text-center">{{$user->name}}</h1>
                <div class="list-group mb-5">
                    {{-- In need of some DRYing --}}
                    @if ($order == "asc" && $by == "date")
                        @foreach ($user->steps->sortBy('stepTotalDate') as $step)
                            <a class="list-group-item list-group-item-action" href="/steps/{{$step->id}}">
                                Date: {{ date('M d Y', strtotime($step->stepTotalDate)) }} - Steps: {{$step->stepTotal}}
                            </a> 
                        @endforeach
                    @elseif ($order == "asc" && $by == "steps")
                        @foreach ($user->steps->sortBy('stepTotal') as $step)
                            <a class="list-group-item list-group-item-action" href="/steps/{{$step->id}}">
                                Date: {{ date('M d Y', strtotime($step->stepTotalDate)) }} - Steps: {{$step->stepTotal}}
                            </a> 
                        @endforeach
                    @elseif ($order == "desc" && $by == "steps")
                        @foreach ($user->steps->sortByDesc('stepTotal') as $step)
                            <a class="list-group-item list-group-item-action" href="/steps/{{$step->id}}">
                                Date: {{ date('M d Y', strtotime($step->stepTotalDate)) }} - Steps: {{$step->stepTotal}}
                            </a> 
                        @endforeach
                    @else
                        @foreach ($user->steps->sortByDesc('stepTotalDate') as $step)
                            <a class="list-group-item list-group-item-action" href="/steps/{{$step->id}}">
                                Date: {{ date('M d Y', strtotime($step->stepTotalDate)) }} - Steps: {{$step->stepTotal}}
                            </a> 
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
        </div>
    </div>

@endsection