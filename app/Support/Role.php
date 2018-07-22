<?php
/**
 * Created by PhpStorm.
 * User: fiqy_
 * Date: 5/28/2018
 * Time: 12:20 AM
 */

namespace App\Support;


class Role
{
    const MANAJER = 'manajer';

    const ADMIN = 'admin';

    const PEGAWAI = 'pegawai';



    const ALL = [
        Role::MANAJER,
        Role::ADMIN,
        Role::PEGAWAI
    ];

    /**
     * check whether the role is exist or not
     * @param $role_name
     * @param null $delimitter
     * @return bool
     */
    public static function check($role_name, $delimitter = null)
    {
        if (is_null($delimitter)) {
            if (in_array($role_name, Role::ALL)) {
                return true;
            }
        }
        /*else{
            if (in_array(explode($delimitter, $role_name)[0], Role::ALL)){
                if (in_array(explode($delimitter, $role_name)[1], Role::PANITIA_ALL)){
                    return true;
                }
            }
        }*/

        return false;
    }
}