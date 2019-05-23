@extends('layouts.layout')

@section('title', 'Friends List')

@section('header', 'Friends List')

@section('content')

    @if($friends->isEmpty())
        {{ var_dump($friends)}} I suck!
    @else

        <table class="table table-striped">
            <thead class="thead-light">
                <th>Name</th>
                <th>Friends Since</th>
                <th>Member Since</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($friends as $friend)
                {{ var_dump($friend)}}
                    <td>{{ $friend->name}}</td>
                    <td>{{ $friend->name }}</td>
                    <td>{{ $friend->created_at }}</td>
                    <td>
                        @if( true )
                            <form action="/friends/" method="POST" style="display:inline">
                                @csrf
                                <input type="hidden" name="friend_id" value="{{ $friend->id }}" />
                                <input type="hidden" name="user_id" value="{{ \Auth::id() }}" />
                                <input type="submit" value="Add Friend" class="btn btn-outline-success">
                            </form>
                        @endif
                        <form action="/friends/" method="POST"  style="display:inline">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="friend_id" value="{{ $friend->id }}" />
                            <input type="submit" value="Remove Friend" class="btn btn-outline-danger">
                        </form>
                    </td>                
                    
                @endforeach

            </tbody>
        </table>

        I got me some
            
        
    @endif
@endsection
