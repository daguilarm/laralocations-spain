<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeder for the Provinces table.
 * 
 * @Package: Daguilarm/LaralocationsSpain
 * @File: Daguilarm/LaralocationsSpain/database/seeders/ProvinceSeeder.php
 * @author Damián Aguilar - damian.aguilarm@gmail.com
 * @version 1.0.1
 * @since 1.0.0
 */
class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->delete();

        DB::table('provinces')->insert([
            ['id' => 1, 'state_id' => 16, 'name' => 'Álava', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'state_id' => 8, 'name' => 'Albacete', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'state_id' => 10, 'name' => 'Alicante', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'state_id' => 1, 'name' => 'Almería', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'state_id' => 7, 'name' => 'Ávila', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'state_id' => 11, 'name' => 'Badajoz', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'state_id' => 4, 'name' => 'Baleares, Islas', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'state_id' => 9, 'name' => 'Barcelona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'state_id' => 7, 'name' => 'Burgos', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'state_id' => 11, 'name' => 'Cáceres', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'state_id' => 1, 'name' => 'Cádiz', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'state_id' => 10, 'name' => 'Castellón', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 13, 'state_id' => 8, 'name' => 'Ciudad Real', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 14, 'state_id' => 1, 'name' => 'Córdoba', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 15, 'state_id' => 12, 'name' => 'Coruña, La', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 16, 'state_id' => 8, 'name' => 'Cuenca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 17, 'state_id' => 9, 'name' => 'Gerona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 18, 'state_id' => 1, 'name' => 'Granada', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 19, 'state_id' => 8, 'name' => 'Guadalajara', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 20, 'state_id' => 16, 'name' => 'Guipúzcoa', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 21, 'state_id' => 1, 'name' => 'Huelva', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 22, 'state_id' => 2, 'name' => 'Huesca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 23, 'state_id' => 1, 'name' => 'Jaén', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 24, 'state_id' => 7, 'name' => 'León', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 25, 'state_id' => 9, 'name' => 'Lérida', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 26, 'state_id' => 17, 'name' => 'Rioja, La', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 27, 'state_id' => 12, 'name' => 'Lugo', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 28, 'state_id' => 13, 'name' => 'Madrid', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 29, 'state_id' => 1, 'name' => 'Málaga', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 30, 'state_id' => 14, 'name' => 'Murcia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 31, 'state_id' => 15, 'name' => 'Navarra', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 32, 'state_id' => 12, 'name' => 'Orense', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 33, 'state_id' => 3, 'name' => 'Asturias', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 34, 'state_id' => 7, 'name' => 'Palencia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 35, 'state_id' => 5, 'name' => 'Palmas, Las', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 36, 'state_id' => 12, 'name' => 'Pontevedra', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 37, 'state_id' => 7, 'name' => 'Salamanca', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 38, 'state_id' => 5, 'name' => 'Tenerife, Santa Cruz De', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 39, 'state_id' => 6, 'name' => 'Cantabria', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 40, 'state_id' => 7, 'name' => 'Segovia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 41, 'state_id' => 1, 'name' => 'Sevilla', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 42, 'state_id' => 7, 'name' => 'Soria', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 43, 'state_id' => 9, 'name' => 'Tarragona', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 44, 'state_id' => 2, 'name' => 'Teruel', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 45, 'state_id' => 8, 'name' => 'Toledo', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 46, 'state_id' => 10, 'name' => 'Valencia', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 47, 'state_id' => 7, 'name' => 'Valladolid', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 48, 'state_id' => 16, 'name' => 'Vizcaya', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 49, 'state_id' => 7, 'name' => 'Zamora', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 50, 'state_id' => 2, 'name' => 'Zaragoza', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 51, 'state_id' => 18, 'name' => 'Ceuta', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 52, 'state_id' => 19, 'name' => 'Melilla', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        ]);
    }
}
