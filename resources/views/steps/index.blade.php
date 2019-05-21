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
                <div class="col-md-5 form-group">
                    <select name="by" id="by" class="form-control">
                        <option value="date" <?=$by =='date' ? 'selected' : '' ?>>Date</option>
                        <option value="steps" <?=$by =='steps' ? 'selected' : '' ?>>Steps</option>
                    </select>
                </div>
                <div class="col-md-5 form-group">
                    <select name="order" id="order" class="form-control">
                        <option value="asc" <?=$order =='asc' ? 'selected' : '' ?>>ASC</option>
                        <option value="desc" <?=$order =='desc' || $order == '' ? 'selected' : '' ?>>DESC</option>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <input type="submit" value="Sort" class="btn btn-outline-success" style="margin:auto;display:block;width:100%">
                </div>
            </div>
        </form>
        <div class="row">
        @foreach($users as $user)
            <div class="col-sm-8 offset-2">
                <h1 class="text-center">{{$user->name}}</h1>
                <div class="list-group mb-5">
                    <?php
                        if ($order == "asc" && $by == "date") $steps = $user->steps->sortBy('stepTotalDate'); 
                        elseif ($order == "asc" && $by == "steps") $steps = $user->steps->sortBy('stepTotal'); 
                        elseif ($order == "desc" && $by == "steps") $steps = $user->steps->sortByDesc('stepTotal');
                        else $steps = $user->steps->sortByDesc('stepTotalDate'); 
                    ?>
                    @foreach ($steps as $step)
                        <a class="list-group-item list-group-item-action" href="/steps/{{$step->id}}">
                            Date: {{ date('M d Y', strtotime($step->stepTotalDate)) }} - Steps: {{$step->stepTotal}}
                        </a> 
                    @endforeach
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
