<?php

namespace Daguilarm\LaralocationsSpain\Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->delete();

        DB::table('countries')->insert([
            'id' => 1,
            'name' => 'España',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
