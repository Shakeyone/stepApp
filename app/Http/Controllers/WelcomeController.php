<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Step;
use App\User;

class WelcomeController extends Controller
{
    public function index(){
        return View('welcome.index');
    }

    public function welcomeData(){
        $last7dayTotals4User = DB::table('users')
                                ->join('steps', 'users.id', '=', 'steps.user_id')
                                ->select('users.name', 'sex', 'birth_date', 'city', 'state', 'stepTotalDate', 'stepTotal' )
                                ->where('steps.user_id', '=', \Auth::id())
                                ->whereMonth('steps.stepTotalDate', date('n'))
                                ->latest('steps.stepTotalDate')
                                ->take(5)
                                ->get();
        return $last7dayTotals4User;
    }
}
