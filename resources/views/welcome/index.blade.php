@extends('layouts.layout')

@guest
    @section('header')
    Welcome to {{config('app.name', 'Laravel')}}<br>
    <small>Where every battle is a victory!</small>
    @endsection
@else
    @section('header') 
        Welcome {{ Auth::user()->name }} <br>to  {{config('app.name', 'Laravel')}}
    @endsection    
@endguest

@section('title', 'Home')

@section('content')

    @guest
        @include('welcome.welcome-guest')
        @yield('guest')             
    @endguest

    @auth
        @include('welcome.welcome-user')
        @yield('user')
    @endauth    

@endsection

@section('scripts')
    @auth
        @include('welcome.welcome-user')
        @yield('scripts')
    @endauth
@endsection

