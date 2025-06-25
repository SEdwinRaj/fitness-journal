<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdetail extends Model
{
    /** @use HasFactory<\Database\Factories\UserdetailFactory> */
    use HasFactory;

    Protected $table = 'userdetail';

    Protected $fillable = ['name','age','height','Current_weight','Desired_weight','Maintenance_calories','protein','fat','carbs','fiber','Sugar','Colastrol'];

    Public $timestamps = false;
}
