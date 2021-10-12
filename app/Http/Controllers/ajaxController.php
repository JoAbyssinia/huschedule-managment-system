<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\customRooms;
use App\Models\offDateModel;
use Illuminate\Support\Arr;

class ajaxController extends Controller
{

    public function store(Request $request)
    {
        $data = new customRooms();
        
        // $checker = DB::table('custom_rooms')->where('building',$request->building)->get()->count();
        
        // if ($checker == 0) {
        
            $data->building=$request->building;
            $data->floors = $request->floor;
            $data->rooms = $request->room;  
            $cor =  $data->save();
            return Response::json($cor);
        // }else {
        //     $idfetch =  DB::table('custom_rooms')->where('building',$request->building)->first();
            
        //     $up =customRooms::where('id',$idfetch->id)->update(['floor' => $request->floor,'room'=>$request->room]);
            
        //     return Response::json($up);
        // }

        
      


       
    }
 
    public function floorfetcher(Request $request)
    {
        $floor = DB::table('rooms')->select('floor')->where('room_type_id','cr')->where('bid',$request->id)->groupBy('floor')->get();
        return Response::json($floor);
    }

    public function roomfetcher(Request $request)
    {
        
        $floors = explode(',',$request->floor);
        $rms =array();
        foreach ($floors as $fv) {
            
         $room = DB::table('rooms')->select('id','name')->where('room_type_id','cr')->where('bid',$request->bid)->where('floor',$fv)->get();

            foreach ($room as $rv) {
                 array_push($rms,$rv);
            }
           
        }

        return Response::json($rms);
    }

    public function customSelectList()
    {
        $select = DB::table('custom_rooms')
        ->join('buildings','custom_rooms.building','=','buildings.id')
        ->orderBy('custom_rooms.id','desc')->get();

        return Response::json($select);
    }

    public function wiapdata()
    {
        customRooms::truncate();
        
    }

    public function customdate(Request $request)
    {   
        
        if ($request->date1!=null && $request->dep1!=null ) {
           $data = new offDateModel();
           $data->dep = $request->dep1;
           $data->offdate=$request->date1;
           $data->save();
        }


        if ($request->date2!=null && $request->dep2!=null ) {
            $data = new offDateModel();
            $data->dep = $request->dep2;
            $data->offdate=$request->date2;
            $data->save();
         }
        
        return $request;
        
    }

    public function wipecustomdate()
    {
       offDateModel::truncate(); 
    }

    public function listOffdates()
    {
        return DB::table('off_date_models')->orderBy('id','DESC')->get();
    }

    public function instimechecker(Request $request)
    {
        $checker = DB::table('class_schedules')->where('date',$request->date)->where('time_id',$request->time)->where('instructor',$request->inte)->get()->count();
        
        return Response::json($checker);   
    }
}

