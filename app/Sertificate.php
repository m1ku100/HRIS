<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sertificate extends Model
{
    use SoftDeletes;

    protected $table = 'sertifikat';

    protected $fillable = [
        'id', 'user_id', 'keahlian', 'setifikat', 'ket_setifikat', 'dir_setifikat',
    ];

    protected $dates = ['deleted_at'];
}
