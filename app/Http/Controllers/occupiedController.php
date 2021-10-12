<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class occupiedController extends Controller
{
   
    public function rooms()
    {
         $availableRooms = array();
        
            $ava = DB::table('rooms')->where('room_type_id','cr')->get();
            foreach ($ava as $value) {
                 array_push($availableRooms,$value->id);
            }

        return $availableRooms;
    
    }

    public static function regular()
    {
    //    total capacity 
            $date = array('mo','tu','we','th','fr'); 
            $time_table = DB::table('time_tables')->where('modality',1)->get();

            $time = array();
            foreach ($time_table as $value) {
                array_push($time,$value->id);
            }  

            
            $room = new occupiedController(); 
            $resource= array();
            foreach ($room->rooms() as $rv) {
  
                  foreach ($date as $dv) {
                     foreach ($time as $tv) {
                         array_push($resource,array('room'=>$rv,'date'=>$dv,'time'=>$tv));
                     } 
                  }
            }
        $total_capacity = sizeof($resource);
    //  occupied 
            $occ_resourse = DB::table('class_schedules')->where('modality','Regular')->get()->count();
        $remaining = $total_capacity - $occ_resourse;

        $passdata = array("occ"=>$occ_resourse,"rem"=>$remaining);

            return  $passdata;
    }


    public static function extention()
    {
    //    total capacity 
            $date = array('mo','tu','we','th','fr'); 
            $time_table = DB::table('time_tables')->where('modality',2)->get();

            $time = array();
            foreach ($time_table as $value) {
                array_push($time,$value->id);
            }  

            
            $room = new occupiedController(); 
            $resource= array();
            foreach ($room->rooms() as $rv) {
  
                  foreach ($date as $dv) {
                     foreach ($time as $tv) {
                         array_push($resource,array('room'=>$rv,'date'=>$dv,'time'=>$tv));
                     } 
                  }
            }
        $total_capacity = sizeof($resource);
    //  occupied 
        $occ_resourse = DB::table('class_schedules')->where('modality','extension')->get()->count();
        $remaining = $total_capacity - $occ_resourse;

        $passdata = array("occ"=>$occ_resourse,"rem"=>$remaining);

            return  $passdata;
    }



    public static function weekend()
    {
    //    total capacity 
            $date = array('sat','sun');  
            $time_table = DB::table('time_tables')->where('modality',3)->get();

            $time = array();
            foreach ($time_table as $value) {
                array_push($time,$value->id);
            }  

            
            $room = new occupiedController(); 
            $resource= array();
            foreach ($room->rooms() as $rv) {
  
                  foreach ($date as $dv) {
                     foreach ($time as $tv) {
                         array_push($resource,array('room'=>$rv,'date'=>$dv,'time'=>$tv));
                     } 
                  }
            }
        $total_capacity = sizeof($resource);
    //  occupied 
            $occ_resourse = DB::table('class_schedules')->where('modality','weekend')->get()->count();
        $remaining = $total_capacity - $occ_resourse;

        $passdata = array("occ"=>$occ_resourse,"rem"=>$remaining);

            return  $passdata;
    }
}
