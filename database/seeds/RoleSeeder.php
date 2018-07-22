<?php

use App\Support\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Manajer',
            'email' => 'ilham.puji100@gmail.com',
            'password' => bcrypt('secret'),
            'role' => Role::MANAJER
        ]);

        User::create([
            'name' => 'Pegawai',
            'email' => 'pegawai@gmail.com',
            'password' => bcrypt('secret'),
            'role' => Role::PEGAWAI
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => Role::ADMIN
        ]);
    }
}
