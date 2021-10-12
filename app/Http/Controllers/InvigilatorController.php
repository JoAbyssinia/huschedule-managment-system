<?php

namespace App\Http\Controllers;
use App\Models\Invigilator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvigilatorController extends Controller
{
    public function index()
    {
        return view('aeinvigilator');
    }

    public function add_inviglator(Request $request)
    {
        $data = new Invigilator();
        $data->fname = $request->fname; 
        $data->lname = $request->lname; 
        if ($data->save()) {
            return redirect()->route('view_invigilator');
            // return view('viewInvigilator')->with('key',1)->with('msg',' add Invigilator ');
        }else{
            return view('aeinvigilator')->with('key',-1)->with('msg',' add Invigilator ');
        }
    }

    public function view_invigilators()
    {

        $listInvigilator =DB::table('invigilators')->orderBy('updated_at','DESC')->get() ;
        return view('viewinvigilator')->with('listInvigilator',$listInvigilator);
    }

    public function delete_invigilators($id)
    {
        $delete = Invigilator::destroy($id);
        $listInvigilator =DB::table('invigilators')->orderBy('updated_at','DESC')->get() ;

        if ($delete) {
            return view('viewInvigilator')->with('listInvigilator',$listInvigilator)->with('key',1)->with('msg',' Delete Invigilator ');
        }else {
            return view('viewInvigilator')->with('listInvigilator',$listInvigilator)->with('key',-1)->with('msg',' Delete Invigilator ');
           
        }
    }


   
}
