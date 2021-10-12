<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public function generate()
    {
        
       $date = array('mo','tu','we','th','re','sa','su');
    
      $rooms = DB::select('SELECT * FROM huclassschedule.rooms');
      $room = array();
      foreach ($rooms as $value) {
        $room[]=$value->id;
      }

      $time_table=DB::select('select * from time_tables where modality = ?', [1]);
      $time = array();
      foreach ($time_table as $value) {
        $time[] = $value->id;
      }
 
      for ($i=0; $i <sizeof($time) ; $i++) { 
        echo $time[$i]." time <br>";
       //  echo $date[$i]."date <br>";
       }

        $users = DB::table('course_assigns')->where("modality",'1')->orderBy("department","ASC")->orderBy("section","ASC") ->get();

        $section = array();
        $instructor = array();
        foreach ($users as $value) {
           $section[] = $value->id;
          $instructor[] = $value->instructor_id;
        }
        echo "<br>";
        $no_sec = sizeof($section);
        foreach ($time as $value) {
          for ($i=0; $i <5 ; $i++) { 
            $is=0;
            foreach ($room as $Rvalue) {

              if ($is!=$no_sec) {
                
                // $dep_sec = $this->extract_dep_sec($section[$is]);

                // $noc=$this->check_today($this->$dep_sec->department,$this->$dep_sec->section); 
                
                // if ($noc) {
                  
                // }
               DB::insert('insert into schedules (section_id, room_id,time_table_id,date) values (?, ?, ?, ?)', [$section[$is], $Rvalue,$value,$date[$i]]); 
                


              //  echo $Rvalue.' '.$date[$i]." ". $value.'<br>'; 
            }else {
               break;
              }
              $is++;
            }
            echo "<br>";
          }
          echo "<br>";
        }
        // return (['jsonname' => $value]);   
    }

    public function extract_dep_sec($sc_id)
    {
      $ch = DB::select('select department,section from course_assigns where id = ?', [$sc_id]);

      return $ch;
    }

    public function check_today($v1,$v2)
    {
      $ch =DB::select('select count(*) from huclassschedule.course_assigns where department=? and section =?;', [$v1],[$v2]);
      return $ch;
    }

    public function index()
    {
      $data = DB::select('select section_id,room_id,time_table_id,date from schedules');
      return view('schedule')->with('schedule', $data); 
    }


}
