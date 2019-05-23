<?php

namespace App\Http\Controllers;

use App\Friends;
use App\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Auth::check())
        {
            $danger = "You must be logged in to see your friends list.";
            return \Redirect::action('Auth\LoginController@showLoginForm')->withErrors($danger);
        }

        $friends = User::where( 'id', '<>', \Auth::id() )
                    //->join('users', 'friends.friend_id', '=', 'users.id')
                    ->get();
        
        return view('friends.index', compact('friends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!\Auth::check())
        {
            $danger = "You must be logged in to add a friend to your list.";
            return \Redirect::action('Auth\LoginController@showLoginForm')->withErrors($danger);
        }
        return view('friends.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Friends::create(request()->validate([
            'friend_id' => ['required', 'exists:users,id', 'unique:friends,friend_id,NULL,id,user_id,'.\Auth::id()],
            'user_id' => ['required']
        ]));

        return redirect('/friends');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friends  $friend
     * @return \Illuminate\Http\Response
     */
    public function show(Friends $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friends  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friends $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friends  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friends $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friends  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friends $friend)
    {
        //
    }
}
