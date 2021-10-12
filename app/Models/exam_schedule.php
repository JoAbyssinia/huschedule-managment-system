<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam_schedule extends Model
{
    protected $fillable=['id',
        'date',
        'time',
        'department',
        'modality',
        'batch',
        'section',
        'course',
        'invigilator_id',
        'classroom_id',
        'type'];
}
