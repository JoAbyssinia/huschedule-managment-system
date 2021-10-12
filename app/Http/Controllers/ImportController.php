<?php

namespace App\Http\Controllers;

use App\Models\course_assign;
use App\Imports\LoadImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function indexload()
    {
        
        $data = course_assign::all();
        return view ('load')->with('data',$data);
    }

    public function importLoad(Request $request)
    {
        Excel::import(new LoadImport,$request->load);
        $data = course_assign::all();
      
        return view ('load')->with('data',$data)->with('key',1)->with('msg','data import');
    }

    public function deleteAll()
    {
        $del = DB::delete('DELETE FROM `course_assigns`');

        $data = course_assign::all();

        if ($del) {
            return view ('load')->with('data',$data)->with('key',1)->with('msg','data wipped');
        }
         return view ('load')->with('data',$data)->with('key',-1)->with('msg','data wipped');

        
    }
}
