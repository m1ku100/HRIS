<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edu extends Model
{


    protected $table = 'edu';

    protected $fillable = [
        'id', 'jenjang'
    ];




}
