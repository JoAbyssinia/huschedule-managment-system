<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class classLoad extends Model
{
    use HasFactory;

    protected $table = "course_assigns";

    protected $fillable = ['course_title','course_id','instructor_name','instructor_id','section','term','department','department_code','modality','batch'];


    public function getLoad()
    {
       return  DB::table('course_assigns')->select('id','course_title','course_id','instructor_name','instructor_id','section','term','depatment','depatment_code','modality','batch');

       
    }
}
