<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lamaran extends Model
{
    use SoftDeletes;

    protected $table = 'lamaran';

    protected $fillable = [
        'id', 'user_id', 'posisi_id', 'masuk_lamaran', 'is_atasi'
    ];

    protected $dates = ['deleted_at'];
}
