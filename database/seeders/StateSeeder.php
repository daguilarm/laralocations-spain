<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder for the States (Comunidades Autónomas) table.
 * 
 * @Package: Daguilarm/LaralocationsSpain
 * @File: Daguilarm/LaralocationsSpain/database/seeders/StateSeeder.php
 * @author Damián Aguilar - damian.aguilarm@gmail.com
 * @version 1.0.1
 * @since 1.0.0
 */
class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->delete();

        DB::table('states')->insert([
            ['id' => '1', 'country_id' => 1, 'name' => 'Andalucía', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '2', 'country_id' => 1, 'name' => 'Aragón', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '3', 'country_id' => 1, 'name' => 'Asturias, Principado de', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '4', 'country_id' => 1, 'name' => 'Baleares, Islas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '5', 'country_id' => 1, 'name' => 'Canarias', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '6', 'country_id' => 1, 'name' => 'Cantabria', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '7', 'country_id' => 1, 'name' => 'Castilla y León', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '8', 'country_id' => 1, 'name' => 'Castilla - La Mancha', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '9', 'country_id' => 1, 'name' => 'Cataluña', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '10', 'country_id' => 1, 'name' => 'Comunidad Valenciana', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '11', 'country_id' => 1, 'name' => 'Extramadura', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '12', 'country_id' => 1, 'name' => 'Galicia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '13', 'country_id' => 1, 'name' => 'Madrid, Comunidad de', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '14', 'country_id' => 1, 'name' => 'Murcia, Región de', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '15', 'country_id' => 1, 'name' => 'Navarra, Comunidad Foral de', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '16', 'country_id' => 1, 'name' => 'País Vasco', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '17', 'country_id' => 1, 'name' => 'Rioja, La', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '18', 'country_id' => 1, 'name' => 'Ceuta', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => '19', 'country_id' => 1, 'name' => 'Melilla', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ]);
    }
}
