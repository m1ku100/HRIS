<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bahasa extends Model
{
    use SoftDeletes;

    protected $table = 'bahasa';

    protected $fillable = [
        'id', 'user_id', 'bhs', 'spoken', 'write',
    ];

    protected $dates = ['deleted_at'];
}
