<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class currentdata extends Model
{
    /** @use HasFactory<\Database\Factories\CurrentdataFactory> */
    use HasFactory;

    Protected $table = 'currentdata';

    Protected $fillable = ['id','name','total_calories','protein','carbs','fiber','fat'];

    Public $timesatamps = false;
}
