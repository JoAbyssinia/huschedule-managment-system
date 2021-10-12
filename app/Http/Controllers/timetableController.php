<?php

namespace App\Http\Controllers;
use App\Models\time_table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Print_;

class timetableController extends Controller
{
    public function index()
    {
        return view('time-table');
    }


    public function add(Request $request)
    {
        $time = new time_table();
        $time->name = $request->name;
        $time->start = $request->stime;
        $time->end = $request->etime;
        $time->modality = $request->modality;

        if ($time->save()) {
            return redirect()->route('view_timetable');
        }
        
    }

    public function edit_timetable($id)
    {
        $retrive = DB::table('time_tables')->where('id',$id)->first();
        return view('time-table')->with('edittt',$retrive);
    }

    public function edittime(Request $request)
    {
        $up = time_table::where('id',$request->id)
        ->update(['name'=>$request->name,
        'start'=>$request->stime,
        'end'=>$request->etime,
        'modality'=>$request->modality]);

        if ($up) {
            return redirect()->route('view_timetable');
        }
    }


    public function delete_timetable($id)
    {
        $del = time_table::destroy($id);
        if ($del) {
            return redirect()->route('view_timetable');
        }else {
            return redirect()->route('view_timetable')->with('msg','try again');
        }  
    }


    public function view()
    {

        $view = DB::table('time_tables')->orderby('created_at','DESC')->orderby('name','ASC')->orderby('start','ASC')->get();
        
        // Print_r($view);
        return view('view_timetable')->with('tlist',$view);
    }
}
