<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

    protected $table = 'skill';

    protected $fillable = [
        'id','user_id', 'tingkat', 'deskripsi',
    ];

    protected $dates = ['deleted_at'];
}
