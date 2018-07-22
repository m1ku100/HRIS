<?php

use Illuminate\Database\Seeder;
use App\Posisi;

class PosisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Posisi::create([
            'nama' => 'Posisi 212121',
            'deskripsi' => 'ilham.puji100@gmail.com',

        ]);

        Posisi::create([
            'nama' => 'Posisi 12',
            'deskripsi' => 'pegawai@gmail.com',
        ]);
    }
}
