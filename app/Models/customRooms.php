<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customRooms extends Model
{
    
    protected $fillable = ['id','building','floors','rooms'];
}
