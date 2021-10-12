<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index()
    {
        return view('report');
    }

// unassigned class view 
    public function unassingedclass()
    {
        $query = DB::select('SELECT CA.id,CA.modality,CA.batch,CA.department, count(*) as `no` FROM huclassschedule.course_assigns CA
        LEFT join  class_schedules CS on CA.id = CS.section_id
         where CS.section_id IS NULL group by CA.department , CA.modality, CA.batch order by CA.batch');


        return view('unassingedclass')->with('unassignedclassdata',$query)->with('mod','all depatments')->with('batch','');
    }

    public function unassingedclassview(Request $request)
    {
     
        // $query = DB::table('course_assigns')->leftjoin('class_schedules','course_assigns.id','=','class_schedules.section_id')->whereNull('class_schedules.section_id')
        // ->where('course_assigns.batch',$request->batch)
        // ->where('course_assigns.modality',$request->modality)
        // ->get();

        // $query1= DB::table("course_assigns")
        // ->leftJoin("class_schedules", function($join){
        //     $join->on('course_assigns.id','=','class_schedules.section_id');
        // })
        // ->whereNull("class_schedules.section_id")
        // ->where(DB::raw('course_assigns.batch='.$request->batch))
        // ->where(DB::raw('course_assigns.modality='.$request->modality))
        // ->get();

        $query2 = DB::select('SELECT CA.id,CA.modality,CA.batch,CA.department, count(*) as `no`  FROM huclassschedule.course_assigns CA
        LEFT join  class_schedules CS on CA.id = CS.section_id
         where CS.section_id IS NULL and CA.batch=? and CA.modality=? group by CA.department , CA.modality order by CA.batch',[$request->batch,$request->modality]);

        // return $query2;

        return view('unassingedclass')->with('unassignedclassdata',$query2)->with('mod',$request->modality)->with('batch',$request->batch);
    }

    public function instloadView()
    {
        return view('instloadview');
    }

    // instrctor load view
    public function instload(Request $request)
    {
        $loadlist = array();
        
        $instList = DB::table('class_schedules')->select('instructor')->where('modality',$request->modality)->groupBy('instructor')->get();

       
        foreach ($instList as $iv) {
           
            // $findsch = DB::table('class_schedules')->select('date','time_id','department','section','batch','course')->where('instructor',$iv->instructor)->where('modality',$mod)->orderBy('date')->get();

            $findsch = DB::select("SELECT * FROM huclassschedule.class_schedules where modality= ? and instructor= ? ORDER BY CASE  WHEN date = 'Mo' THEN 1 WHEN date = 'Tu' THEN 2 WHEN date = 'We' THEN 3 WHEN date = 'Th' THEN 4 WHEN date = 'Fr' THEN 5 WHEN date = 'Sat' THEN 6 WHEN date = 'Sun' THEN 7 END ASC", [$request->modality,$iv->instructor]);
            array_push($loadlist, array('inst'=>$iv->instructor,$findsch));
        }

        return view('instloadview')->with('datapass',$loadlist)->with('search','instructor load')->with("mod",$request->modality);
    }



    public function tableview (Request $request)
    {
        // return $request;
        $passdata = array(); 
        // fetch all batch
        $batchlist = DB::table('class_schedules')
            ->select('department', 'modality', 'batch','name')
            ->join('rooms','rooms.id','=','class_schedules.room_id')
            ->where('modality', $request->modality)
            ->where('batch', $request->batch)
            ->groupBy('department', 'modality', 'batch')
            ->get();

          $sectionV = array();
        foreach ($batchlist as $glv) {
            $section = array();
            
     
            // fetch all taken courses
            $fetchCourses = DB::table('class_schedules')
                ->join('rooms','rooms.id','=','class_schedules.room_id')
                ->where('department', $glv->department)
                ->where('modality', $request->modality)
                ->where('batch', $request->batch)
                ->get();
            
            foreach ($fetchCourses as $schedule) {
                $section[$schedule->section][$schedule->date][$schedule->time_id] = $schedule;
                array_push($sectionV,$schedule->section);
            
            }
            $passdata[$glv->department] = $section;
        }
        if ($request->modality=="Regular") {
            $mod=1;
        }
        if ($request->modality=="Extension") {
            $mod=2;
        }
        if ($request->modality=="Weekend") {
            $mod=3;
        }
        $time = DB::table('time_tables')
                ->where('modality', $mod)
                ->get();
            if($request->modality=="Regular" || $request->modality=="Extension"){
               $time_table = ['mo', 'tu', 'we', 'th', 'fr'];
            }elseif($request->modality=="Weekend"){
              $time_table = ['sat', 'sun'];
            }
            $all_section=[
                1=>'Section A',
                2=>'Section B',
                3=>'Section C',
                4=>'Section D',
                5=>'Section E',
                6=>'Section F',
                7=>'Section G',
                8=>'Section H',
                9=>'Section I',
                10=>'Section J',
                11=>'Section K',
                12=>"Section L",
                13=>"Section M",
                14=>"Section N",
                15=>"Section O",
                16=>"Section P",
                17=>"Section Q",
                18=>"Section R",
                19=>"Section S",
            ];

            // dd($passdata);

            // return $passdata;
         // end of zolas version   

            // john version
            // return view('report')
            // ->with('tableview',$passdata)
            // ->with("mod",$request->modality)
            // ->with('time',$time);


            return view('report')
            ->with('tableview',$passdata)
            ->with('searchTable', $request->filter)
            ->with("mod",$request->modality)
            ->with('batch',$request->batch)
            ->with('time',$time)
            ->with("time_table", $time_table)
            ->with("all_section", $all_section)
            ->with("sectionV",$sectionV);
    }


    public function CalenderEdit($dep)
    {

        
        $data = array();
        $pdata = explode(",", $dep);
        /*
        $batch = DB::table('class_schedules')->select('department','modality','batch')->where('modality',$pdata[1])->where('batch',$pdata[2])->where('department',$pdata[0])->groupBy('department','modality','batch')->get();
    
        foreach ($batch as $glv) {

            // fetch all section in each batch
            $fetchSection = DB::table('class_schedules')->where('department',$glv->department)->where('modality',$glv->modality)->where('batch',$glv->batch)->groupBy('section')->get();
            
             $section = array();
            foreach ($fetchSection as $fsv) {
                // fetch all taken courses
                $fetchCourses = DB::table('class_schedules')->where('department',$fsv->department)->where('modality',$fsv->modality)->where('batch',$fsv->batch)->where('section',$fsv->section)->get();
              array_push($section,array('section'=>$fsv->section,'class'=>$fetchCourses));  
            }
            array_push($data,array('batch'=>$glv,$section));
           
        }
        */
        
        // new for edit 
        $passdata = array();

        $batchlist = DB::table('class_schedules')
            ->select('department', 'modality', 'batch')
            ->join('rooms','rooms.id','=','class_schedules.room_id')
            ->where('modality',$pdata[1])
            ->where('batch', $pdata[2])
            ->where('department', trim($pdata[0]))
            ->groupBy('department', 'modality', 'batch')
            ->get();

    //    return $batchlist;
        foreach ($batchlist as $glv) {
            $section = array();
     
            // fetch all taken courses
            $fetchCourses = DB::table('class_schedules')
                ->join('rooms','rooms.id','=','class_schedules.room_id')
                ->where('department', $glv->department)
                ->where('modality', trim($pdata[1]))
                ->where('batch', trim($pdata[2]))
                ->where('department', trim($pdata[0]))
                ->get();

             
            foreach ($fetchCourses as $schedule) {
                $section[$schedule->section][$schedule->date][$schedule->time_id] = $schedule;
            }
            $passdata[$glv->department] = $section;
        
        }

            $code="";
            if ($pdata[1]=="Regular") {
                $code = 1;
            }elseif ($pdata[1]=="Extension") {
                $code = 2;
            }else{
                $code = 3;
            }

        $time = DB::table('time_tables')
                ->where('modality',$code)
                ->get();

        //   return $time;      
            if($pdata[1]=="Regular" || $pdata[1]=="Extension"){
               $time_table = ['mo', 'tu', 'we', 'th', 'fr'];
            }elseif($pdata[1]=="Weekend"){
              $time_table = ['sat', 'sun'];
            }
            $all_section=[
                1=>'Section A',
                2=>'Section B',
                3=>'Section C',
                4=>'Section D',
                5=>'Section E',
                6=>'Section F',
                7=>'Section G',
                8=>'Section H',
                9=>'Section I',
                10=>'Section J',
                11=>'Section K',
                12=>"Section L",
                13=>"Section M",
                14=>"Section N",
                15=>"Section O",
                16=>"Section P",
                17=>"Section Q",
                18=>"Section R",
                19=>"Section S"
            ]; 

            // dd($passdata);

            // return $passdata;
         // end of zolas version   

            // john version
            // return view('report')
            // ->with('tableview',$passdata)
            // ->with("mod",$request->modality)
            // ->with('time',$time);




        // list of unassigned 

        $unassigned = DB::select('SELECT CA.id,CA.modality,CA.batch,CA.department,CA.course_id,CA.instructor_id,CA.section,CA.term FROM huclassschedule.course_assigns CA
        LEFT join  class_schedules CS on CA.id = CS.section_id
         where CS.section_id IS NULL and CA.batch=? and CA.modality=? and CA.department=?',[$pdata[2],$pdata[1],$pdata[0]]);


            // return ($passdata);
        
            return view('calenderviewEdit')
            ->with('data',$passdata)
            // ->with('searchTable', $request->filter)
            ->with("mod",$pdata[1])
            ->with('batch',$pdata[2])
            ->with('time',$time)
            ->with("time_table", $time_table)
            ->with("all_section", $all_section)
            ->with('unassign',$unassigned);
        // return $unassigned;
        // return view('calenderviewEdit')->with('data',$data)->with('unassign',$unassigned);
        // return view('calenderviewEdit');
    }

    public function Examview()
    {
        return view('examcalenderview');
    }

    public function ExamViewFilter(Request $request)
    {
        $master = array();

        $examDate = DB::table('exam_schedules')
        ->where('modality',$request->modality)
        ->where('batch',$request->batch)
        ->groupBy('date')
        ->get();

        foreach ($examDate as $edv) {
            
            $examTime = DB::table('exam_schedules')
            ->where('modality',$request->modality)
            ->where('batch',$request->batch)
            ->where('date',$edv->date)
            ->groupBy('time')
            ->get();
            foreach ($examTime as $etv) {
                $timeCollecter = array();
                $examDep = DB::table('exam_schedules')
                ->where('modality',$request->modality)
                ->where('batch',$request->batch)
                ->where('date',$etv->date)
                ->where('time',$etv->time)
                ->groupBy('department')
                ->get();

                $departments = array();
                foreach ($examDep as $edpv) {
                    $sections= array();
                    $examSec = DB::table('exam_schedules')
                    ->select('section','name','department','course')
                    ->join('invigilators', 'invigilator_id','=','invigilators.id')
                    ->join('rooms', 'classroom_id', '=', 'rooms.id')
                    ->where('modality',$request->modality)
                    ->where('batch',$request->batch)
                    ->where('date',$edpv->date)
                    ->where('time',$edpv->time)
                    ->where('department',$edpv->department)
                    ->get();

                    
                    foreach ($examSec as $esv) {
                        // print_r($esv);
                        array_push($sections,array('section'=>$esv->section,'room'=>$esv->name,'course'=>$esv->course));
                    } 
                    $departments[$edpv->department] = $sections;
                   
                }      
                $timeCollecter[$etv->time]=$departments;
            }

             $master[$edv->date]=$timeCollecter;

        } 
      

        $all_section=[
            1=>'A',
            2=>'B',
            3=>'C',
            4=>'D',
            5=>'E',
            6=>'F',
            7=>'G',
            8=>'H',
            9=>'I',
            10=>'J',
            11=>'K'
        ];

        $depList = DB::table('course_assigns')
        ->select('department')
        ->where('modality',$request->modality)
        ->where('batch',$request->batch)
        ->groupBy('department')
        ->get();


        // $key = array_keys($master);
        // return dd($master);
        return view('examcalenderview')
        ->with('tableview',$master)
        ->with('dep',$depList)
        ->with('section',$all_section)
        ->with("mod",$request->modality)
        ->with('batch',$request->batch);
    }

    public function invigLoad()
    {        
        return view('invigilatorloadview');
    }

    public function invigLoadtable(Request $request)
    {
        $master = array();
            $dep=DB::table('exam_schedules')
            ->where('batch',$request->batch)
            ->where('modality',$request->modality)
            ->groupBy('department')
            ->get();

            foreach ($dep as $dv) {
                $department =array();
                $section=DB::table('exam_schedules')
                ->where('batch',$dv->batch)
                ->where('modality',$dv->modality)
                ->where('department',$dv->department)
                ->groupBy('section')
                ->get();

                foreach ($section as $sv) {
                    $section = array();
                    $invigRoom=DB::table('exam_schedules')
                    ->join('invigilators', 'invigilator_id','=','invigilators.id')
                    ->join('rooms', 'classroom_id', '=', 'rooms.id')
                    ->where('batch',$sv->batch)
                    ->where('modality',$sv->modality)
                    ->where('department',$sv->department)
                    ->where('section',$sv->section)
                    ->get();

                    foreach ($invigRoom as $irv) {
                        $room =array();
                        $examRoom=DB::table('exam_schedules')
                        ->join('invigilators', 'invigilator_id','=','invigilators.id')
                        ->join('rooms', 'classroom_id', '=', 'rooms.id')
                        ->where('batch',$irv->batch)
                        ->where('modality',$irv->modality)
                        ->where('department',$irv->department)
                        ->where('section',$irv->section)
                        ->where('classroom_id',$irv->classroom_id)
                        ->get();

                           foreach ($examRoom as $erv) {
                            array_push($room,array('date'=>$erv->date,'invig'=>$erv->fname.' '.$erv->lname,'course'=>$erv->course));
                           } 

                           $section[$irv->name]=$room;
                        // array_push($section,array('room'=>$irv->name,'date'=>$irv->date,'invig'=>$irv->fname.' '.$irv->lname,'course'=>$irv->course));
                    
                    }
                   $department[$sv->section]= $section;
                }
                $master[$dv->department]= $department;
            }

            $all_section=[
                1=>'A',
                2=>'B',
                3=>'C',
                4=>'D',
                5=>'E',
                6=>'F',
                7=>'G',
                8=>'H',
                9=>'I',
                10=>'J',
                11=>'K'
            ];

         $Edate = DB::table('exam_schedules')
         ->select('date')
         ->where('modality',$request->modality)
         ->where('batch',$request->batch)
         ->groupBy('date')
         ->get();   

        // return dd($master);
        return view('invigilatorloadview')
        ->with('tableview',$master)
        ->with('date',$Edate)
        ->with('section',$all_section)
        ->with("mod",$request->modality)
        ->with('batch',$request->batch);
    }
}
