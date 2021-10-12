<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class landingCotroller extends Controller
{
    public function index()
    {
 
        $total = DB::table('rooms')->get()->count();
        $cr = DB::table('rooms')->where('room_type_id','cr')->get()->count();
        $lib = DB::table('rooms')->where('room_type_id','li')->get()->count();
        $lab = DB::table('rooms')->where('room_type_id','la')->get()->count();
        $off = DB::table('rooms')->where('room_type_id','of')->get()->count();

        return view('dashboard')->with('total',$total)->with('cr',$cr)->with('lib',$lib)->with('lab',$lab)->with('off',$off);
    }


    public static function nounassigned()
    {
    return DB::table('course_assigns')->leftjoin('class_schedules','course_assigns.id','=','class_schedules.section_id')->whereNull('class_schedules.section_id')->count();
    }
}
