<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Building;

class buildingController extends Controller
{

    public function index()
    {
        return view('aebuilding');
    }
    public function add_building(Request $request)
    {
        $b = new Building();
        $b->name = $request->name;
        $b->type = $request->type;
        if($b->save()){
            return redirect()->route('view-building');
        }
    }
 
    public function edit_building($id)
    {
        $retrive = DB::table('buildings')->where('id',$id)->first();
        return view('aebuilding')->with('editd',$retrive);
    }

    public function edit(Request $request)
    {
        $b = new Building();
        // $b->id=$request->id;
        // $b->name = $request->name;
        // $b->type = $request->type;

        $up = Building::where('id',$request->id)
        ->update(['name'=>$request->name,'type'=>$request->type]);

        // $up = DB::update('update buildings set name = ? and type= ? where id = ?', [$request->name,$request->type,$request->id]);

        if($up) {
            return redirect()->route('view-building');
        }else {
            
        }
    }

    public function delete_building($id)
    {
        $del = building::destroy($id);
        if ($del) {
            return redirect()->route('view-building');
        }else {
            return redirect()->route('view-building');
        }  
    }

    public function view_building()
    {
        $building = DB::table('buildings')->orderby('created_at','DESC')->get();
        return view('view_building')->with('listBuilding',$building);
    }


}
