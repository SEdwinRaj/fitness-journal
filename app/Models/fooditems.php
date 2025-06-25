<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fooditems extends Model
{
    /** @use HasFactory<\Database\Factories\FooditemsFactory> */
    use HasFactory;

    Protected $table = 'fooditems';

    Protected $fillable = ['name','total_calories','protein','carb','fiber','fat'];

    public $timestamps = false;
}
