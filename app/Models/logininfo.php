<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class logininfo extends Model
{
    
    Protected $table = 'logininfo';

    Protected $fillable = ['username','password'];

}
