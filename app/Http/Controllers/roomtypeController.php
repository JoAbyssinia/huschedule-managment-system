<?php

namespace App\Http\Controllers;
use App\Models\room_type;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class roomtypeController extends Controller
{
    public function index()
    {
        return view('aeroomtype');
    }

    public function addrt(Request $request)
    {
        $rt = new room_type();
        $rt->name = ucfirst($request->name);
        if($rt->save()){
            return redirect()->route('view-roomtype');
        }
    }

    public function editrt($id)
    {
        $retrive = DB::table('room_types')->where('id',$id)->first();
        return view('aeroomtype')->with('editrt',$retrive);
    }

    public function edit_room(Request $request)
    {
        $up = room_type::where('id',$request->id)
        ->update(['name'=>$request->name]);

        if ($up) {
            return redirect()->route('view-roomtype');
        }
    }

    public function delete_roomtype($id)
    {
        $del = room_type::destroy($id);
        if ($del) {
            return redirect()->route('view-roomtype');
        }else {
            return redirect()->route('view-roomtype')->with('msg','try again');
        }  
    }

    public function view_roomtype()
    {
        $room_type = DB::table('room_types')->orderby('created_at','DESC')->get();
        return view('view-roomtype')->with('rt',$room_type);
    }
}
