<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffDayStorageController extends Controller
{
    public static function offdateChacker($batch,$dep,$day)
    {
        // $checker = DB::table("off_date_storages")
        // ->where("modalities", "=", $batch)
        // ->wherelike("offdates", "like", '%{$day}%')
        // ->where("deps", "like", '%$dep%')
        // ->get();

    
        $checker = DB::select("SELECT * FROM huclassschedule.off_date_storages where modalities = ".$batch." and offdates like '%".$day."%' and deps like '%".$dep."%';");

        if ($checker) {
            return 1;
        }else{
            return 0;
        }
    }
}
