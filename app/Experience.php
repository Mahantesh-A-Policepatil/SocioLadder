<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    //
    use SoftDeletes;
    
    protected $table = "experience";

    protected $fillable = [
        'id',
        'user_id',
        'company_name',
        'designation',
        'from_date',
        'to_date',
        'job_type_id',
        'experience_details',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'from_date',
        'to_date',
        'created_at',
        'updated_at',
    ];  

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function job_types()
    {
        return $this->belongsTo(JobType::class,'job_type_id','id');
    }
}
