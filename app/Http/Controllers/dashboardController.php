<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $dep = DB::select("SELECT department FROM `course_assigns` GROUP BY department");
        $batch = DB::select("SELECT batch FROM `course_assigns` GROUP BY batch");
       return view('class-dashboard')->with("dep",$dep)->with("batch",$batch);
    }
    
    public function filter(Request $request)
    {    
        
       
        $header = array();
        $sections = array();
        $schedules= array();
        
        $dep=$request->dep;


       
        array_push($header,$dep);

        array_push($header,$request->batch);  

        $modality=$request->mod;
        
        array_push($header,$modality);


        
        
        $fileter = DB::table('course_assigns')->where('department',$dep)->where('modality',$request->mod)->where('batch',$request->batch)->groupBy('section')->get();
       
        foreach ($fileter as $fv) {
            array_push($sections,array("id"=>$fv->id,"section"=>$fv->section));
            // print_r($fv);
            // fetch the sections id ;
            $fetchSectionsID =DB::table('course_assigns')->where('department',$fv->department)->where('modality',$fv->modality)->where('batch',$fv->batch)->where('section',$fv->section)->orderBy('section')->get();
            // print_r($fetchSectionsID); 
            array_push($schedules,$fetchSectionsID);
            //  start hire fatch the classes form class schedule table and pass enaught view;             
        }
        asort($sections);

        $secWithSchedul =array();

        foreach ($schedules as $scv ) {
            // print(($scv));
            // print($val);
            // print("<br>");

            for ($i=0; $i <sizeof($scv) ; $i++) { 
                // print(" yes ".$scv[$i]->id);

                $schFileter =DB::table('class_schedules')->where('section_id',$scv[$i]->id)->get();
                              
                // print_r($scv[$i]);
                // print_r($schFileter);
            // print("<br>");
            // print("<br>");
            // print_r(sizeof( (array)$scv[$i]));

            $sectv = (array)$scv[$i];
            
            $filteArray = array();

            foreach ($schFileter as $scve) {
               
                array_push($filteArray,$scve);
            }
            
            array_push($secWithSchedul,array_merge($sectv,$filteArray));
            }


            // print("<br>  breack <br>"); 
        }
 
    //    return sizeof($secWithSchedul[0]);
        $deps = DB::select("SELECT department FROM `course_assigns` GROUP BY department");
        $batch = DB::select("SELECT batch FROM `course_assigns` GROUP BY batch");

        if (empty($secWithSchedul) || sizeof($secWithSchedul[0])!=14 ) {
            
        return view('class-dashboard')
        ->with('header',$header)
        ->with('section',$sections)
        ->with('schedule',0)
        ->with("dep",$deps)
        ->with("batch",$batch);
           
        }else {

        return view('class-dashboard')
        ->with('header',$header)
        ->with('section',$sections)
        ->with('schedule',$secWithSchedul)
        ->with("dep",$deps)
        ->with("batch",$batch);
        }
        // print_r(sizeof($secWithSchedul));
        // return (sizeof($secWithSchedul[0])); 
        // return $request;
        // return view('dashboard')->with('header',$header)->with('section',$sections)->with('schedule',$secWithSchedul);
    }
}
