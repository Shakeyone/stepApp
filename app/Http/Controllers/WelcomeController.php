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

        if(!empty($_GET['week']) && self::validateWeek($_GET['week'])){
            $from = date('Y-m-d', strtotime(date('Y').'W'.$_GET['week']));
            $to = date('Y-m-d', strtotime('+6 day',strtotime(date('Y').'W'.$_GET['week'])));
        }else{
            $currentWeekNumber = date('W');
            $from = date('Y-m-d', strtotime(date('Y').'W'.$currentWeekNumber));
            $to = date('Y-m-d', strtotime('+6 day',strtotime(date('Y').'W'.$currentWeekNumber)));
        }
        
        $last7dayTotals4User = DB::table('users')
                                ->join('steps', 'users.id', '=', 'steps.user_id')
                                ->select('users.name', 'steps.stepTotalDate', 'steps.stepTotal' )
                                ->where('steps.user_id', '=', \Auth::id())
                                ->whereMonth('steps.stepTotalDate', date('n'))
                                ->whereBetween('steps.stepTotalDate', [$from, $to])
                                ->latest('steps.stepTotalDate')
                                ->take(7)
                                ->get();
        return $last7dayTotals4User;
    }

    private function validateWeek(int $week){
        $valid = false;
        $firstWeekofCurrentMonth = date('W',strtotime('first day of ' . date('F Y')));
        $lastWeekofCurrentMonth = date('W',strtotime('last day of ' . date('F Y')));
        if ($week >= $firstWeekofCurrentMonth && $week <= $lastWeekofCurrentMonth){
            $valid = true;
        }
        return $valid;
    }
}
