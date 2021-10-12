<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class realnameController extends Controller
{


    public static function timeTable($id)
    {
        $time = DB::table('time_tables')->select('start','end')->where('id',$id)->get();
        $timeR=$time[0]->start." - ".$time[0]->end;
        return $timeR;
    }

    public static function room($id)
    {
        $room = DB::table('rooms')->select('name')->where('id',$id)->get();
        return $room[0]->name;
    }

    public static function date($date)
    {
        if ($date=='mo') {
            return 'Monday';
        }elseif ($date=='tu') {
            return 'Tuesday';
        }elseif ($date=='we') {
            return 'Wensday';
        }elseif ($date=='th') {
            return 'Thersday';
        }elseif ($date=='fr') {
            return 'Friday';
        }elseif ($date=='sat') {
            return 'Satrday';
        }elseif ($date=='sun') {
            return 'Sunday';
        }
    }
    public static function section($date)
    {
        $alphas = array('A','B','C','D','E','F','G','H','I','J','K','L');
        return $alphas[$date-1];
    }

    public static function instrealname($id)
    {
        $name= DB::table('course_assigns')->select('instructor_name')->where('instructor_id',$id)->get();
        return $name[0]->instructor_name;
    }

    public static function course_title($id)
    {
        $name= DB::table('course_assigns')->select('course_title')->where('course_id',$id)->get();
        return $name[0]->course_title;
    }
}
