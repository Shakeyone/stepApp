<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;

class StepsController extends Controller
{
    public function index()
    {
        $steps = Step::all();

        return view('steps.index',compact('steps'));
    }

    public function create()
    {
        return view('steps.create');
    }

    public function store()
    {
        $steps = new Step();

        $steps->stepTotal = request('stepTotal');
        $steps->user_id = request('user_id');

        $steps->save();

        return redirect('/steps');

    }
}
