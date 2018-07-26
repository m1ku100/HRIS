<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posisi extends Model
{
    use SoftDeletes;

    protected $table = 'posisi';

    protected $fillable = [
        'id', 'nama', 'deskripsi', 'is_over',
        ];

    protected $dates = ['deleted_at'];

    public function pelamar()
    {
        return $this->hasMany('App\Lamaran', 'posisi_id');
    }
}
