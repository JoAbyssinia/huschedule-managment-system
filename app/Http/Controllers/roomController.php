<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Room;
use App\Models\Building;
use App\Models\room_type;
use Illuminate\Http\Request;

class roomController extends Controller
{
    public function index()
    {
        $b = Building::all();
        $r = room_type::all();
        return view('aerooms')->with('buliding',$b)->with('rtype',$r);
    }

    public function add(Request $request)
    {
        $room = new Room();
        $room->name = $request->name;
        $room->floor =$request->floor; 
        $room->bid = $request->building;
        $room->room_type_id = $request->roomt;
        if ($request->office_name!=null) {
          $room->officename = $request->office_name;  
        }
        
        $room->roomsize = $request->rsize; 
        $room->noofchair =$request->noch;
        $room->whiteboard=$request->nowh;
        $room->capacity = $request->cap;


        if($room->save()){
            return redirect()->route('view_rooms');
        }else {
            
        }
        
    }

    public function delete($id)
    {
        $del = Room::destroy($id);
        if ($del) {
            return redirect()->route('view_rooms');
        }else {
            return redirect()->route('view-roomtype')->with('msg','try again');
        }  
    }

    public function view()
    {
        $view = DB::table('rooms')->orderby('created_at','DESC')->get();
        return view('view_room')->with('vr',$view);
    }
}
