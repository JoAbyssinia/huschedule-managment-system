<?php

namespace App\Http\Controllers;
use App\Models\Building;

use App\Models\ClassSchedule;
use App\Models\offDateModel;
use App\Models\OffDateStorage;
use Illuminate\Support\Facades\Response; 
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\Printer;

use function PHPUnit\Framework\returnSelf;

class scheduleController1 extends Controller
{

   private $IdPre='';

    public function building()
    {
        $bd=DB::select('SELECT * FROM `buildings` WHERE name NOT LIKE "%admin%" ORDER BY `name`  ASC');
        // $bd = DB::table('buildings')->where()->orderBy('name','ASC')->get();
         $building = array();
        //  $rm = array();
        //  $flr = array();
        $i=0;
        foreach ($bd as $bdv) {
            array_push($building,$bdv);
        }

        return $building;
    }
    public function index()
    {
        // $bd = Building::all();
        // $bd=DB::select('SELECT * FROM `buildings` WHERE name NOT LIKE "%admin%" ORDER BY `name`  ASC');
        // // $bd = DB::table('buildings')->where()->orderBy('name','ASC')->get();
        //  $building = array();
        // //  $rm = array();
        // //  $flr = array();
        // $i=0;
        // foreach ($bd as $bdv) {
        //     array_push($building,$bdv);
            // $flr[$i]=array();
            // $floor = DB::select('SELECT floor FROM huclassschedule.rooms where bid=? group by floor', [$bdv->id]);
            //   $rm[$i]=array();
            // foreach ($floor as $flrv) {
              
            // array_push($flr[$i],$flrv);
            //     $room = DB::select('SELECT * FROM huclassschedule.rooms where floor=? and room_type_id  ="cr"', [$flrv->floor]);
            //     foreach($room as $rmv) {
            //          array_push($rm[$i],$rmv);
            //     }
            // }
            // $i++;
        // }

        // $sc = DB::table('course_assigns')->get()->count();

      
        // return $rm[0];

        $batch = DB::table('course_assigns')->select('batch')->groupBy('batch')->orderBy('batch')->get();
      
        return view('class_schedule')->with('building',$this->building())->with('batch',$batch);
    }

    public function clearschedule()
    {
        ClassSchedule::truncate();
        OffDateStorage::truncate();
        return redirect()->route('class_schedule');
    }

    public function pre_class_sch(Request $request)
    {
        if ($request->batch==2011) {
            
        }elseif ($request->batch==2012) {
            
        }elseif ($request->batch==2013) {
            
        }

        if ($request->modality=='1') {
            
        }elseif ($request->modality=='2') {
            
        }elseif ($request->modality=='3') {
           
        }


        if ($request->gradute=='under') {
            
        }elseif ($request->gradute=='post') {
            
        }elseif ($request->gradute=='level') {
          
        }

        $offday = $request->offday;
        // room
        if (isset($request->allroom)) {
          
        }elseif (isset($request->new_buiding)) {
            # code...
        }elseif (isset($request->shewa_building)) {
            # code...
        }

        // custom floor
        if (isset($request->new_buidingfloor)) {
            # code...
        }elseif (isset($request->shewa_buildingfloor)) {
            # code...
        }

        // custom room
        if (isset($request->new_buidingroom)) {
            # code...
        }elseif (isset($request->shewa_buildingroom)) {
            # code...
        }


        if ($request->modality==1) {
            $date = array('mo','tu','we','th','fr'); 
        }elseif ($request->modality==2) {
            $date = array('mo','tu','we','th','fr'); 
        }elseif ($request->modality==3) {
            $date = array('sat','sun'); 
        }
       

        // off date  one
        $fristOffday =$date;
        if (isset($request->dep2) && ($request->modality==1)) {
            if (isset($request->ofd2)) {  
                foreach($request->ofd2 as $ofdy){
                    $ind = array_search($ofdy,$fristOffday);
                    array_splice($fristOffday, $ind, 1); 
                }
            }   
        }

        return $request;
    }


    public function generate(Request $request)
    {
        //  from Api 
        if ($request->batch==2011) {
            
        }elseif ($request->batch==2012) {
            
        }elseif ($request->batch==2013) {
            
        }

        if ($request->modality=='1') {
            
        }elseif ($request->modality=='2') {
            
        }elseif ($request->modality=='3') {
           
        }

        //  which program will make schedule  undergraduete, postgradute level
        if ($request->gradute=='under') {
            
        }elseif ($request->gradute=='post') {
            
        }elseif ($request->gradute=='level') {
          
        }

       

        
        // working dates
        if ($request->modality==1) {
            $date = array('mo','tu','we','th','fr'); 
        }elseif ($request->modality==2) {
            $date = array('mo','tu','we','th','fr'); 
        }elseif ($request->modality==3) {
            $date = array('sat','sun'); 
        }
       

        print_r($date);
        print("<br>");
        // off date  one
        // print_r($request->);
        if (isset($request->dep1) && ($request->modality==1)) {
        $fristOffday =$date;
        $fristOffDep = $request->dep1;
            if (isset($request->ofd1)) {  
                foreach($request->ofd1 as $ofdy){
                    $ind = array_search($ofdy,$fristOffday);
                    array_splice($fristOffday, $ind, 1); 
                }
            }   
        
        print_r("first off avalable dates <br>");
        print_r($fristOffDep);
        print("<br>");
        print_r($fristOffday);
        }
        // off day two 
        
        if (isset($request->dep2) && ($request->modality==1)) {
        $secontOffday =$date;
        $secontOffDep = $request->dep2;
            if (isset($request->ofd2)) {  
                foreach($request->ofd2 as $ofdy){
                    $ind = array_search($ofdy,$secontOffday);
                    array_splice($secontOffday, $ind, 1); 
                }
            }   
        

        print_r("<br> second off avalable dates <br>");
        print_r($secontOffDep);
        print("<br>");
        print_r($secontOffday);
        }
        // if no ofday enterd 

        // time table
        $time_table=DB::select('select * from time_tables where modality = ?', [$request->modality]);
        $time = array();
        foreach ($time_table as $value) {
            array_push($time,$value->id);
        }  

        print_r("<br>  time table <br>");
        print_r($time);

        // Room availblility
       // custom floor
       $availableRooms = array();
            if (isset($request->allroom)) {
                // unset($availableRooms); 
                $ava = DB::table('rooms')->where('room_type_id','cr')->get();
                foreach ($ava as $value) {
                     array_push($availableRooms,$value->name);
                }
               
            }

        print_r("<br> available room <br>");
        print_r($availableRooms);
            //  new building
            if (isset($request->new_buidingfloor)) {
                # code...
                $fr = DB::select('SELECT * FROM huclassschedule.rooms where room_type_id = "cr" and floor = ?' , [$request->new_buidingfloor]);
                foreach ($fr as $value) {
                    if ( in_array($value,$request->new_buidingroom) ) {
                        array_push($availableRooms,$value);
                    }
                }
            }
            print_r("<br> new available room <br>");
            print_r($availableRooms);
            //  shewa building
            if (isset($request->shewa_buildingfloor)) {
                # code...
                $fr = DB::select('SELECT * FROM huclassschedule.rooms where room_type_id = "cr" and floor = ?' , [$request->shewa_buildingfloor]);
                foreach ($fr as $value) {
                    if ( in_array($value,$request->shewa_buildingroom) ) {
                        array_push($availableRooms,$value);
                    }
                }
            }

            print_r("<br> shewa available room <br>");
            print_r($availableRooms);

           
            // $room = array();
            // foreach ($rooms as $value) {
            // $room[]=$value->id;
            // }

       
            print_r("<br> batch <br>");
            print_r($request->batch);
        
        $section = DB::table('course_assigns')->where("modality",$request->modality)->where('batch',$request->batch)->orderBy("department","ASC")->orderBy("section","ASC") ->get();
        
        print_r("<br> section <br>");
        print_r($section);

        $sectionA = array();
        $instructor = array();
        $department = array();
        foreach ($section as $value) {
            array_push($sectionA,$value->id);
          $instructor[] = $value->instructor_id;
          array_push($department,$value->department);
        }

        print_r("<br> sectionA <br>");
        print_r($sectionA);
        print_r("<br> instructor <br>");
        print_r($instructor);
        print_r("<br> department <br>");
        print_r($department);
        //  print(sizeof($sectionA).'<br>');
        $place = 0;

        foreach ($availableRooms as  $rv) {
            print_r("<br>".$rv."<br>");
            foreach ($date as $dv) {

                // print($place);
                if ($place <=sizeof($sectionA)) {
                     $section=$this->retriveSection($place,$sectionA);
                     
                if ($section == 0) {
                    // print_r('stop hire');
                    break;
                }
                // print_r($section);
                    for ($i=0; $i <sizeof($time) ; $i++) { 
                    if (isset($fristOffDep)) {
                        if (in_array($department[$i],$fristOffDep) ) {
                            if (in_array($dv,$fristOffday) ) {
                                print_r("to day ".$dv."<br>");
                               print_r(',room '.strval($rv).' date '.strval($dv).' time_table '.$time[$i].' section '.strval($sectionA[$i]).' <br> ');
                            }
                        }
                     }
                    //  if second option have off dat 
                     if (isset($secontOffDep)) {
                        if (in_array($department[$i],$secontOffDep)) {
                            if (in_array($dv,$secontOffday)) {
                                print_r(',1room '.strval($rv).' date '.strval($dv).' time_table '.$time[$i].' section '.strval($sectionA[$i]).' <br> ');
                            }
                        }
                     }
                    //  if no class have off day
                    // print("section ");
                    // print_r($section);
                     if (!isset($fristOffDep) && !isset($secontOffDep)) {
                        print_r(',room '.strval($rv).' date '.strval($dv).' time_table '.$time[$i].' section '.strval($section[$i]).' instruceter '.$instructor[$i].' <br> ');
                      }      
                    }
                }else {
                  break;
                } 
                $place+=4; 
                }
                print_r('<br>');
            }
        
    }

    public function retriveSection($s,$sec,$end=null)
    {
        $va = array();
        $dif = sizeof($sec)-$s;
        $e=$s+4;

        // print_r('tis is value'.$dif.'<br>');
       
        if ($dif<=0) {
            return 0;
        }else {
            if ($dif <4) {
                $e = $dif;
            }else {
            print('<br>'.$dif." difrence ".$e );  
            print_r('<br> start '.$s." end ".$e.'<br>' );
            
                for ($i=$s; $i <$e ; $i++) { 
                    // $va[] = $sec[$i];
                    array_push($va,$sec[$i]);
                }
            }
         return $va;
        }
       
    }

// working one
    public function schedule01(Request $request)
    {
    
    // transfer off date in to permanent storage place 
       
        $this->addOffDatesPermanemt($request->batch);

         $availableRooms = array();
        if (isset($request->allroom)) {

              $ava = DB::table('rooms')->where('room_type_id','cr')->orderBy('name','ASC')->orderBy('floor','ASC')->get();
            foreach ($ava as $value) {
                 array_push($availableRooms,$value->id);
            }

        }else {
           $costomRooms = DB::table('custom_rooms')->get();
           foreach ($costomRooms as $crv) {
                $cls = explode(',',$crv->rooms);
                foreach ($cls as $clsv) {
                   array_push($availableRooms,$clsv); 
                }
               
           }
        }

        // working dates
       
        if ($request->modality=="Regular" || $request->modality=="Extension" ) {
            $date = array('mo','tu','we','th','fr'); 
        }elseif ($request->modality=="Weekend") {
            $date = array('sat','sun'); 
        }

        // available time
        if ($request->modality=="Regular" || $request->modality=="regular"  ) {
           $mod=1; 
        }
        if ($request->modality=="Extension" || $request->modality=="extension" ) {
            $mod=2; 
         }
         if ($request->modality=="Weekend" || $request->modality=="weekend" ) {
            $mod=3; 
         }

        
        $time_table=DB::select('select * from time_tables where modality = ?', [$mod]);
        $time = array();
        foreach ($time_table as $value) {
            array_push($time,$value->id);
        }  
        
        
       
        $resource= array();
          foreach ($availableRooms as $rv) {

                foreach ($date as $dv) {
                   foreach ($time as $tv) {
                       array_push($resource,array('room'=>$rv,'date'=>$dv,'time'=>$tv));
                   } 
                }
          }
        
        
        // section date
        $assign = DB::table('course_assigns')->where("modality", trim($request->modality))->where('batch',trim($request->batch))->orderBy("department","ASC")->orderBy("section","ASC")->orderBy("term","ASC")->get();


        $classes= array();
        foreach ($assign as $av) {
            array_push($classes,array('id'=>$av->id,'section' =>$av->section ,'term'=>$av->term,'inst' =>$av->instructor_id ,'course' =>$av->course_id,'dep'=>$av->department ));
        }

        // no. assign section  
        $assigned_room = DB::table('class_schedules')->where('modality',$request->modality)->where('batch',$request->batch)->get()->count();
        
      
        // loop values 
        $no_sections = sizeof($classes);

        
        $no_resource = sizeof($resource);

       
        
        if ($no_resource  < $no_sections ) {
            return view('class_schedule')->with('building',$this->building())->with('key',-1)->with('msg',' Selected resourses are no enought for classes need to prepare schedule, Please add room in to custome select setion or use all available room option.'); 
        }
        if ($no_sections ==0 ) {
            return view('class_schedule')->with('building',$this->building())->with('key',-1)->with('msg','the selected batch didn\'t have any assigned coursess.'); 
        }


        // return $classes[0]['dep'];
        // return $resource[0]['date'].$resource[0]['time'].$classes[0]['inst'];
        $i=0;
        $tch=0;
        // unassigned counters 
        $enghClsCntr=0;
        $instHvClsCntr=0;

        $unassignedCounter =0;
        while ($no_sections != $assigned_room) {
        // model initialization 
        $irec=0;
        $cc = new ClassSchedule();


         


         $getbefor = $this->getBefore($classes[$i]['id']);
          if (!$getbefor) {

            $ofdate = $this->offdatechecker($classes[$i]['dep'],$resource[$tch]['date']);
            
            if (!$ofdate) {

                // print_r('values of checker '.$ofdate);
 
           $classChecker =$this->resourseChecker($resource[$tch]['room'],$resource[$tch]['time'],$resource[$tch]['date']);
            if(!$classChecker){
                
               
               
            // an assign class counter 
            // print('<br> intration couter'. $tch .'<br>');
            if(!$this->IDHolder($classes[$i]['id'])){
                $enghClsCntr=0;
                $instHvClsCntr=0; 

                // print('<br>');
                // print_r('reset both');
                // print('<br>');
            }else{
               $sum =($enghClsCntr+$instHvClsCntr);
                // print('<br>');
                // print_r('enough class coutner '.$enghClsCntr);
                // print('<br>');
                // print_r('inst have a class counter '.$instHvClsCntr);
                // print('<br>');
                // print_r('the sum of two is '.$sum." ---i".$i);
                // print('<br>');

               if ($request->modality=="Regular" || $request->modality=="regular") {
                if ($sum >= 20) {
                    $i++;
                    $unassignedCounter++;
                 }
               }elseif ($request->modality=="Extension" || $request->modality=="extension") {
                  if ($sum >= 5) {
                     $i++;
                    $unassignedCounter++;
                  }
               }elseif ($request->modality=="Weekend" || $request->modality=="weekend") {
                if ($sum>=7) {
                    $i++;
                    $unassignedCounter++;
                 }
               }
            }

    $total_select = DB::table('course_assigns')->where('modality',$request->modality)->where('batch',$request->batch)->get()->count();

    // return $total_select;
    if ($i >= $total_select) {
        $i=0;
    }

    $instChecker = $this->timeChacker($resource[$tch]['date'],$resource[$tch]['time'],$classes[$i]['inst']);  
        
    // print($resource[$tch]['date']." - ".$resource[$tch]['time']." - ".$classes[$i]['inst'] ."<br>");
    
            if(!$instChecker){
                $havechecker =$this->havedate($classes[$i]['section'],$resource[$tch]['date'],$classes[$i]['dep'],$request->batch,$request->modality); 
                if ($request->modality=="Regular" || $request->modality=="regular"  ) {
                    $chval =1;
                 }
                 if ($request->modality=="Extension" || $request->modality=="extension" ) {
                    $chval =2;
                  }
                  if ($request->modality=="Weekend" || $request->modality=="weekend" ) {
                    $chval =3;
                  }
                // print('<br> checker '. $havechecker.' </br>');
                if ( $havechecker < $chval) {      

                        $cc->section_id = $classes[$i]['id'];
                        $cc->room_id = $resource[$tch]['room'];
                        $cc->date=$resource[$tch]['date'];
                        $cc->time_id= $resource[$tch]['time'];
                        $cc->section=$classes[$i]['section'];
                        $cc->term=$classes[$i]['term'];
                        $cc->instructor=$classes[$i]['inst'];
                        $cc->course=$classes[$i]['course'];
                        $cc->department=$classes[$i]['dep'];
                        $cc->modality=$request->modality;
                        $cc->batch=$request->batch;
                   
                        if($cc->save()){
                            $i++;
                        }
                    }else{
                      
                        $enghClsCntr++;
                      
                        // print('<br> enought class to day'.$classes[$i]['id'] .' '.$resource[$tch]['date'].' '.$resource[$tch]['time']. '<br>');
                       
                    }
                }else{
                  
                    $instHvClsCntr++; 
                    // print("<br> have a class inst ".$classes[$i]['id'] .' '.$resource[$tch]['date'].' '.$resource[$tch]['time']." ---". $classes[$i]['inst']     ."<br>");
                }
                
                }else{
                    // resourse checker 
                }

            }else{
                // print_r('this are of dates  '.$classes[$i]['dep'].' - '.$resource[$tch]['date']);
            } // end of off date
            }else{
                // print_r('<br> get befor '.$classes[$i]['id']);
            }

            $assigned_room = DB::table('class_schedules')->where('modality',$request->modality)->where('batch',$request->batch)->get()->count();

            $assigned_room = $assigned_room + $unassignedCounter;

            // print('section '.$no_sections.' == '.$assigned_room.'<br>' );
            // print('resource '.($no_resource-1).' == '.$i.' == '.$irec.'<br>' );
           
            // print(' i ='.$i );
            // print(' irec ='.$irec );
            // print(' tch ='.$tch );
            
            if(($no_resource-1)==$irec || ($no_resource-1)==$tch  ) {
                $irec=0;
                $tch = 0;
            }else{
               $irec++;  
               $tch++;
            }
            if (($no_sections)==$i) {
                $i=0;

                // $irec=0;
                // break;
            }else {
                // $i++;  
            } 
            // $tch++;

          
            // $no_sections = sizeof($classes);
            // $no_resource = sizeof($resource);
            // print_r("<br> <br> on run no. sections ".$no_sections);
            // print_r("<br> <br> on rin no. rooms ".$no_resource);
            // print_r("<br> <br> on run no. assigned section ".$assigned_room);
            // print("<br> <br> <br>");

          //    end of while loop
        }
        //  return null;
        // $no_sections = sizeof($classes);
        // $no_resource = sizeof($resource);
        // print_r("<br> <br> after no. sections ".$no_sections);
        // print_r("<br> <br> arter no. rooms ".$no_resource);
        // print_r("<br> <br> after no. assigned section ".$assigned_room);
        // print("<br> <br> <br>");

        $dep = DB::select("SELECT department FROM `course_assigns` GROUP BY department");
        $batch = DB::select("SELECT batch FROM `course_assigns` GROUP BY batch");
        return view('class-dashboard')->with('key',1)->with('msg','class schedule preparetion ')->with("dep",$dep)->with("batch",$batch);
    }

    public function havedate($sec,$date,$dep,$batch,$mod)
    {
        // print($sec);
        // print(" ");
        // print($date); 
        // print(" ");
        // print($dep); 
        // print(" ");
        // print($batch); 
        // print(" ");
        // print($mod); 
      
        return DB::table('class_schedules')->where("section",$sec)->where("date",$date)->where("department",$dep)->where('batch',$batch)->where('modality',$mod)->get()->count();
      
    }

    public function timeChacker($date,$time,$inst)
    {
        return DB::table('class_schedules')->where("date",$date)->where("time_id",$time)->where("instructor",$inst)->get()->count();
    }

    public function resourseChecker($room,$time,$date){
        return DB::table('class_schedules')->where("date",$date)->where("time_id",$time)->where("room_id",$room)->exists();   
    }    

    public function getBefore($id)
    {
        return DB::table('class_schedules')->where('section_id',$id)->get()->count();
    }

    public function InstClassOccupeid($id,$mod)
    {
        return DB::table('course_assigns')->where('instructor_id',$id)->where('modality',$mod)->get()->count();
    }

    public function offdatechecker($dep,$date)
    {
        $headarray=array();

        $gonedate = array();
        $gonedep=array();

        $gtwodate = array();
        $gtwodep=array();

        array_push($headarray,$gonedep,$gonedate,$gtwodep,$gtwodate);
        $offdate = DB::table('off_date_models')->get();

        $i=0;
        foreach ($offdate as $value) {
           
            $depp= explode(',',$value->dep);
            $datee= explode(',',$value->offdate);

            array_push($headarray[$i],$depp);
            array_push($headarray[$i+1],$datee);

            $i=$i+2;
        }
        // print('<br>');
        // print_r(array_search($dep,$headarray[0][0]));
        // print('-');
        // print_r(array_search($date,$headarray[1][0]));
        // print('<br>');
        
        if(isset($headarray[0][0])){
            if(strval(array_search($dep,$headarray[0][0]))!=NULL){
                if (strval(array_search($date,$headarray[1][0]))!=NULL) {
                    return true;
                }
            }
        }
        if(isset($headarray[2][0])){       
            if (sizeof($headarray[2])!=0) {

            if (strval(array_search($dep,$headarray[2][0]))!=NULL) {
                    if (strval(array_search($date,$headarray[3][0]))!=NULL) {
                        return true;
                    }
                } 

            }
        }
        

        return false;
    }
    private $a=0;
    public function IDHolder($id)
    {
        if ($this->IdPre=='') {
            $this->IdPre=$id;
            // print('initial '.$id.'<br>');
            return -1;
        }elseif ($this->IdPre == $id) {
            // print($this->IdPre .'similar'.$id.'<br>');
            // print($this->a.'<br>');
            $this->a++;
            return true;
        }else{
            // print($this->IdPre .'not similar'.$id.'<br>');
            $this->IdPre=$id;
            return false;
        }  
    }

    public function addOffDatesPermanemt($batch)
    {
       
        $offDate = offDateModel::all();
        foreach ($offDate as $ofv) {
             $OFDS = new OffDateStorage();

             $OFDS->deps = $ofv->dep;
             $OFDS->offdates = $ofv->offdate;
             $OFDS->modalities = $batch;
             $OFDS->save();
            
        }
    }
}

