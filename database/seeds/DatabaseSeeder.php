<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(EduSeeder::class);
        $this->call(PosisiSeeder::class);
        $this->call(NegaraSeeder::class);
        $this->call(JurusanSeeder::class);
        $this->call(IndustriSeeder::class);

    }
}
