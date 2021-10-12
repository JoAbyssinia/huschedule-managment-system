<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use DateTime;
use DateInterval;
use DatePeriod;
use App\Models\exam_schedule;
use Illuminate\Http\Request;

class ExamScheduleController extends Controller
{
    public function index()
    {
            return view('exam_schedule');
    }

    public function examgenerate(Request $request)
    {   
        $cd =0;
        $noCoursess = 0;

        /**
         * befor schedule checker
         * check if this selecet filters have a schedule before 
         *  */ 
        
         $batch = array();
        $b4exits=0;
         foreach ($request->batch as $bv) {
             array_push($batch,$bv);

             $b4exits += DB::table('exam_schedules')
             ->where('modality',$request->modality)
             ->where('batch',$bv)
             ->where('type',$request->type)
             ->get()->count();   
         }

         if ($b4exits!=0) {
            return view('exam_schedule')->with('key',-1)->with('msg','This selection assign already, if you need to make Exam schedule First clear by clicking clear Exam schedule buttom'); 
         }        

        // time priparetion
        $timeArray = array();

        if ($request->modality==1 || $request->modality==3) {

            if (isset($request->timeMor)) {
                    array_push($timeArray,'mor');
            }
            if (isset($request->timeAfter)) {
                array_push($timeArray,'after');   
            }

            if (sizeof($timeArray)==0) {
                return 'select at list one time';
            }

        }else {
            array_push($timeArray,'night');
        }

        // section preparetion
        $master = array();

        foreach ($request->batch as $bv) {
            # code...
        $depBatch = DB::table('class_schedules')
        ->select('department','batch')
        ->where('modality',$request->modality)
        ->where('batch',$bv)
        ->groupBy('department','batch')
        ->orderBy('batch')
        ->get(); 

        foreach ($depBatch as $dbv) {

            $depSections = DB::table('class_schedules')
            ->select('section')
            ->where('modality',$request->modality)
            ->where('department',$dbv->department)
            ->where('batch',$bv)
            ->groupBy('department','section')->get()->count();
          
            $courseList =DB::table('class_schedules')
            ->select('course')
            ->where('modality',$request->modality)
            ->where('department',$dbv->department)
            ->where('batch',$bv)
            ->groupBy('course')->get();

                $course = array();

                foreach ($courseList as $clv) {
                    array_push($course,$clv);
                  
                }               

                 $cd = $cd+$depSections; 
                array_push($master, array('dep'=>$dbv->department,'batch'=>$dbv->batch,'sec'=>$depSections,'list'=>$course));   

                if ($noCoursess==0) {
                    $noCoursess = sizeof($course);
                }else{
                    if (sizeof($course)>$noCoursess) {
                        $noCoursess = sizeof($course);     
                    }
                }
        }

     }


        // class room preparetion 
        $classRoom = DB::table('rooms')
        ->select('id','name')
        ->where('room_type_id','cr')
        ->orderBy('bid','DESC')->get(); 
        $classRoomArray = array();

        foreach ($classRoom as $crv) {
            array_push($classRoomArray,$crv->id);
        }

        // invigilator  
        // $invigilator = array();
        // $invigilatorDb = DB::table('invigilators')->select('id')->get();
        // foreach ($invigilatorDb as $inv) {
        //    array_push($invigilator,$inv->id);
        // }
        function invigilatorOrdering($loop)
        { 
            $invigilator = array();
            if ($loop%2==0) {
                $invigilatorDb = DB::table('invigilators')->select('id')->orderBy('id','ASC')->get();
            }else {
                $invigilatorDb = DB::table('invigilators')->select('id')->orderBy('id','DESC')->get();
            }
            foreach ($invigilatorDb as $inv) {
               array_push($invigilator,$inv->id);
            }
            return $invigilator;
        }
        $invigilator = invigilatorOrdering(1);

        // date range picked
        $date= explode('-',$request->date);
        $startDate = $date[0];
        $startDate =strtotime($startDate);
        $startDate = date('Y-m-d',$startDate);

        $endDate = $date[1];
        $endDate = strtotime($endDate);
        $endDate = date('Y-m-d',$endDate);

        $begin = new DateTime($startDate);
        $end = new DateTime($endDate);

        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin, $interval, $end);


        $noSelectedDays =0;
        foreach ($period as $dt) { $noSelectedDays++; }

        // check lists 
        /**
         * todo: check number of days and no course.   
         * todo: check number of section per a day and infigilator 
         * */ 

         $noTimeFrame =sizeof($timeArray);
        // print_r($timeArray);
        //  return $noSelectedDays;
        //  print($noSelectedDays .' = '. $noCoursess.'<br>');
      

        //  print(count($invigilator). ' '. $cd);

        if ($request->modality==3) {
            $noCoursess = $noCoursess/2;
        }
         if ($noSelectedDays < $noCoursess ) {

            return view('exam_schedule')->with('key',-1)->with('msg',' not eneugh dates selected, minimum seleceted day '.($noSelectedDays));
            //  return 'not eneugh dates selected';
         }elseif(count($invigilator)<$cd){
            return view('exam_schedule')->with('key',-1)->with('msg',' doesn\'t have eneugh invigilater ');
            //  return 'not eneugh infigilater';
         }
        
       $courseCounter = 0;
        foreach ($period as $dt) {
            $infigCounter = 0;
            $roomCounter = 0;
            $timeCounter = 0;
            
           
            foreach ($master as $mv) {
               
                $remainigRoom = array_slice($classRoomArray,$roomCounter);


                if ($remainigRoom < $mv['sec'] ) {
                  
                    $roomCounter=0;
                    $timeCounter++;
                }

               for ($i=1; $i <=$mv['sec'] ; $i++) { 
               
                  $val = (array_key_exists($courseCounter,$mv['list'])) ? $mv['list'][$courseCounter]->course : "null";
                    if (!array_key_exists($roomCounter,$classRoomArray)) {
                            $timeCounter++;
                            // if (array_key_exists($timeCounter,$timeArray)) {
                            //     $timeCounter++;
                            // }
                        $roomCounter=0;
                    }
                    // insert in DB 
                    if ($val != 'null') {
                    $examData = new exam_schedule();
                    $examData->date = $dt->format("Y-m-d");
                    $examData->time = $timeArray[$timeCounter];
                    $examData->department = $mv['dep'];
                    $examData->modality = $request->modality;
                    $examData->section = $i;
                    $examData->batch = $mv['batch'];
                    $examData->course = $val;
                    $examData->invigilator_id = $invigilator[$infigCounter]; 
                    $examData->classroom_id = $classRoomArray[$roomCounter];
                    $examData->type = $request->type;
                    $examData->save(); 

                    $invigilator = invigilatorOrdering($i);
                    // print_r($invigilator);
                    }
                  $roomCounter++;  
                  $infigCounter++;
               }
            }
            $courseCounter++;
        }

        // dd($master);
        return view('examcalenderview')->with('key',1)->with('msg',' Exam Schedule preparetion  ');        
    }
    
    public function truncet()
    {
        exam_schedule::truncate();
        return view('exam_schedule')->with('key',1)->with('msg',' Exam Schedule Delete '); 
    }
}

