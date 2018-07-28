<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experience extends Model
{
    use SoftDeletes;

    protected $table = 'experience';

    protected $fillable = [
        'id', 'user_id', 'job_title', 'company', 'industri_id', 'position', 'jenis_gaji', 'salary', 'des_pos', 'work_from', 'work_till'
    ];

    protected $dates = ['deleted_at'];
}
