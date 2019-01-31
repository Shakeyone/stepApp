@extends('layouts.layout')

@section('header', 'Welcome')

@section('title', 'Home')

@section('content')

    <div class="title m-b-md text-center">
        Step App
    </div>

    <div class="links text-center">
        <a href="/steps">Step Index</a>
        <a href="https://laravel.com/docs">Docs</a>
        <a href="https://laracasts.com">Laracasts</a>
        <a href="https://laravel-news.com">News</a>
        <a href="https://blog.laravel.com">Blog</a>
        <a href="https://nova.laravel.com">Nova</a>
        <a href="https://forge.laravel.com">Forge</a>
        <a href="https://github.com/laravel/laravel">GitHub</a>
    </div>

@endsection