<?php

namespace App;

use App\Support\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    public function isManajer()
    {
        return ($this->role == Role::MANAJER);
    }

    /**
     * Check whether this user is seeker or not
     * @return bool
     */
    public function isPegawai()
    {
        return ($this->role == Role::PEGAWAI);
    }

    /**
     * Check whether this user is admin or not
     * @return bool
     */
    public function isAdmin()
    {
        return ($this->role == Role::ADMIN);
    }


    public function getPendidikan()
    {
        return $this->hasMany('App\Pendidikan','user_id');
    }

    public function getLamaran()
    {
        return $this->hasMany('App\Lamaran','user_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];



}
