<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = 'students';
    
    protected $fillable = [
        'fname',
        'mname',
        'lname',    
        'sname',
        'gender',
        'bdate',
    ];
}
