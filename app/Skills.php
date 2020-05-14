<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    //
    protected $table = "skills";

    protected $fillable = [
        'id',
        'user_id',
        'skill_name',
        'proficiency_id',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];  

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function proficiency()
    {
        return $this->belongsTo(Proficiency::class,'proficiency_id','id');
    }
}
