<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $guarded = [];

    public function importSteps( string $range = 'month' )
    {


        $steps = array();

        $xmlReader = new \XMLReader();
        $xmlReader->open("public/export.xml");

        // Move our pointer to the first <drug /> element.
        $line = 0;
        $stepLine = 0;

        while ($xmlReader->read())
        {
            if($xmlReader->getAttribute('type') == 'HKQuantityTypeIdentifierStepCount'){
                $stepLine++;
                $stepDate = strtotime($xmlReader->getAttribute('startDate'));
                $stepMonth = date('m', $stepDate);
                $stepDay = date('d', $stepDate);
                $stepYear = date('Y', $stepDate);
                $currentMonth = date('m');
                $currentDay = date('d');
                $currentYear = date('Y');
                $index = (string)$stepYear . (string)$stepMonth . (string)$stepDay;
                    if( $range == 'month' ){
                        if ( $stepMonth == $currentMonth && $stepYear == $currentYear ){
                            if( isset($steps[$index])){
                                $steps[$index] += $xmlReader->getAttribute('value');
                            }else{
                                $steps[$index] = $xmlReader->getAttribute('value');
                            }
                        }
                    }elseif( $range == 'year' ){
                        if ( $stepYear == $currentYear ){
                            if( isset($steps[$index])){
                                $steps[$index] += $xmlReader->getAttribute('value');
                            }else{
                                $steps[$index] = $xmlReader->getAttribute('value');
                            }
                        }
                    }else{
                        if( isset($steps[$index])){
                            $steps[$index] += $xmlReader->getAttribute('value');
                        }else{
                            $steps[$index] = $xmlReader->getAttribute('value');
                        }
                    }
            }


            // Go to next <drug />.
            // $xmlReader->next();
            $line++;
        }

        $xmlReader->close();


        echo(print_r($steps, true). " $line $stepLine");

    }
}
