<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proficiency extends Model
{
    //
    protected $table = "proficiency";

    protected $fillable = [
        'id',
        'proficiency_type',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];  
}
