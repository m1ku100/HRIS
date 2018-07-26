<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $table = 'negara';

    protected $fillable = [
        'id', 'nama',
    ];

}
