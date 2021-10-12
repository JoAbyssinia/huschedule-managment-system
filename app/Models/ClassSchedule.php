<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{

    protected $fillable = ['section_id','room_id','date','time_id','section','instructor','course','department','modality','batch'];

}
