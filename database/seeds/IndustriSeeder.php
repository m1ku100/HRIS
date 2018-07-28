<?php

use Illuminate\Database\Seeder;
use App\Industri;

class IndustriSeeder extends Seeder
{
    const INDUSTRI = [
        'Agribisnis',
        'Akuntan',
        'Alas Kaki',
        'Asuransi',
        'Bioteknologi / biologi',
        'Biro Perjalanan',
        'Kertas',
        'Desain Interior',
        'E-Comerce',
        'Ekspedisi / Agen cargo',
        'Elektronika',
        'Energi',
        'Farmasi',
        'Furnitur',
        'Garmen / Tekstil',
        'Hiburan',
        'Hotel',
        'Hukum',
        'Internet',
        'Jasa Pemindahan',
        'Jasa Pengamanan',
        'Kecantikan',
        'Kehutanan',
        'Kelautan',
        'Keramik',
        'Keuangan',
        'Kimia',
        'Komputer (IT Hardware)',
        'Komputer / TI',
        'Konstruksi',
        'Konsultan',
        'Kosmetik',
        'Kulit',
        'Kurir',
        'Logam',
        'Logistik',
        'Mainan',
        'Makanan Dan Minuman',
        'Manajemen Fasilitas',
        'Manufaktur',
        'Media',
        'Mekanik / Listrik',
        'Mesin / Peralatan',
        'Minyak dam Gas',
        'Otomotif',
        'Pemerintahan',
        'Pendidikan',
        'Penerbangan',
        'Percetakan',
        'Perdagangan Komoditas',
        'Perdagangan Umum',
        'Pergudangan',
        'Perikanan',
        'Periklanan',
        'Permata dan Perhiasan',
        'Pertambangan dan Mineral',
        'Properti',
        'Pupuk Pestisida',
        'Lain-Lain',

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (static::INDUSTRI as $industri) {
            Industri::create([
                'nama' => $industri
            ]);
        }
    }
}
