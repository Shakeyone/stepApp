<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;
use App\User;

class StepsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $steps = Step::all()->sortByDesc('stepTotalDate');

        // return view('steps.index',compact('steps'));

        $users = User::all();

        return view('steps.index', compact('users'));
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
            $danger = "You must be logged in to enter a step total.";
            return \Redirect::action('Auth\LoginController@showLoginForm')->withErrors($danger);
        }
        return view('steps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Step::create(request()->validate([
            'stepTotal' => ['required', 'gt:100'],
            // I can't understand the unique rule but it works correctly :(
            'stepTotalDate' => ['required', 'unique:steps,stepTotalDate,NULL,id,user_id,'.\Auth::id()],
            'user_id' => 'required'
        ]));

        return redirect('/steps');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Step $step)
    {
        return view('steps.show', compact('step'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Step $step)
    {
        return view('steps.edit', compact('step'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Step $step)
    {
        $step->update(request(['stepTotal']));

        return redirect('/steps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Step $step)
    {
        $step->delete();

        return redirect('/steps');
    }
}
