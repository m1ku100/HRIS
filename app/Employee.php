<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $table = 'pegawai';

    protected $fillable = [
        'id', 'user_id', 'nama', 'dir_foto', 'tmp_lahir', 'tgl_lahir', 'gender', 'telp', 'email', 'exp_total'
        ];

    protected $dates = ['deleted_at'];

    public function getUser()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
