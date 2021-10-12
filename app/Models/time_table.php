<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class time_table extends Model
{
    protected $fillable = ['id','name','start','end','modality'];
}
