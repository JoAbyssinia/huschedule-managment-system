<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class fetchClassController extends Controller
{
    public static function classfetcher($dep,$mod,$batch,$sec,$date)
    {

        
        $fquery= DB::table('class_schedules')->where('department',$dep)->where('modality',$mod)->where('batch',$batch)->where('section',$sec)->where('date',$date)->get();
        
       
        if (count($fquery)) {
           return $fquery;
        }else {
           return null; 
        }
        
    }

    public static function classfetcherTime($dep,$mod,$batch,$sec,$date,$time)
    {

        
        $fquery= DB::table('class_schedules')->where('department',$dep)->where('modality',$mod)->where('batch',$batch)->where('section',$sec)->where('date',$date)->where('time_id',$time)->get(); 
       
        if (count($fquery)) {
           return $fquery;
        }else {
           return null; 
        }
        
    }
}
