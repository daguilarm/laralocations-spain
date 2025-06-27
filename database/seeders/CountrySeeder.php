<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder for the Countries table.
 * 
 * @Package: Daguilarm/LaralocationsSpain
 * @File: Daguilarm/LaralocationsSpain/database/seeders/CountrySeeder.php
 * @author Damián Aguilar - damian.aguilarm@gmail.com
 * @version 1.0.1
 * @since 1.0.0
 */
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
