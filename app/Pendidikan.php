<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pendidikan extends Model
{
    use SoftDeletes;

    protected $table = 'pendidikan';

    protected $fillable = [
        'id', 'user_id', 'edu_id', 'instansi', 'jurusan', 'negara_id', 'tahun_lulus' , 'ipk'
    ];

    protected $dates = ['deleted_at'];

    public function getUser()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
