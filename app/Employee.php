<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $table = 'pegawai';

    protected $fillable = [
        'id', 'user_id', 'nama', 'tmp_lahir', 'tgl_lahir', 'gender', 'telp', 'email'
        ];

    protected $dates = ['deleted_at'];

}
