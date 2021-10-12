<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffDateStorage extends Model
{
    protected $filable = ['id','deps','modalities','offdates'];
}
