<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course_assign extends Model
{
    use HasFactory;

    protected $fillable = ['course_title','instructor_name','section','department','modality','batch'];
}
