<?php

use Illuminate\Database\Seeder;
use App\Edu;

class EduSeeder extends Seeder
{
    const TINGKAT = [
        'Sekolah Dasar',
        'Sekolah Menengah Pertama / Sederajat',
        'Sekolah Menengah Atas / Sederajat',
        'Diploma',
        'Sarjana (S1)',
        'Sarjana (S2)',
        'Sarjana (S3)',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (static::TINGKAT as $tingkat) {
            Edu::create([
                'jenjang' => $tingkat
            ]);
        }
    }
}
