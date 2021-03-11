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
        date_default_timezone_set("America/Chicago");

        if(!empty($_GET['week']) && self::validateWeek($_GET['week'])){
            $weekDateRange = $this->getWeekStartAndEndDates( $_GET['week'] );
        }else{
            $weekDateRange = $this->getWeekStartAndEndDates();
        }
        
        $last7dayTotals4User['counts'] = DB::table('users')
                                ->join('steps', 'users.id', '=', 'steps.user_id')
                                ->select('users.name', 'steps.stepTotalDate', 'steps.stepTotal' )
                                ->where('steps.user_id', '=', \Auth::id())
                                ->whereBetween('steps.stepTotalDate', [$weekDateRange['week_start'], $weekDateRange['week_end']])
                                ->orderBy('steps.stepTotalDate', 'asc')
                                ->take(7)
                                ->get()
                                ->toArray();
        return array_merge($last7dayTotals4User,$weekDateRange);
    }

    private function getWeekStartAndEndDates( $week = NULL, $year = NULL ) {
        $dto = new \DateTime();

        if($week === NULL) $week = date('W');
        if($year === NULL) $year = date('Y');

        $weekDateRange['week_start'] = $dto->setISODate($year, $week)->format('Y-m-d');
        $weekDateRange['week_end'] = $dto->modify('+6 days')->format('Y-m-d');

        return $weekDateRange;
    }

    private function validateWeek( int $week ){
        if( is_int( $week ) && $week > 0 && $week < 54 ) return true;
        return false;
    }

}
