<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            \Daguilarm\LaralocationsSpain\Database\Seeders\CountrySeeder::class,
            \Daguilarm\LaralocationsSpain\Database\Seeders\StateSeeder::class,
            \Daguilarm\LaralocationsSpain\Database\Seeders\ProvinceSeeder::class,
            \Daguilarm\LaralocationsSpain\Database\Seeders\MunicipalitySeeder::class,
        ]);
    }
}
