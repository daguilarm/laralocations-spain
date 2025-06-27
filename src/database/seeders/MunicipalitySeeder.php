<?php

declare(strict_types=1);

namespace Daguilarm\LaralocationsSpain\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MunicipalitySeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('municipalities')->truncate();
        Schema::enableForeignKeyConstraints();

        $municipalities = include database_path('data/municipalities.php');

        // --- Pre-procesamiento para asegurar la integridad de los datos ---
        $uniqueMunicipalities = [];
        $seenIneCodes = [];

        $this->command->info('Processing and cleaning municipality data...');

        foreach ($municipalities as $municipality) {
            // 1. Convertir `ine_code` vacíos a NULL para evitar errores de constraint en strings vacíos.
            if (isset($municipality['ine_code']) && trim($municipality['ine_code']) === '') {
                $municipality['ine_code'] = null;
            }

            // 2. Eliminar duplicados basados en 'ine_code' antes de intentar la inserción.
            $ineCode = $municipality['ine_code'];
            if ($ineCode !== null) {
                if (isset($seenIneCodes[$ineCode])) {
                    $this->command->warn("Skipping duplicate municipality with ine_code: {$ineCode} (Name: {$municipality['name']})");
                    continue; // Saltar este registro duplicado
                }
                $seenIneCodes[$ineCode] = true;
            }
            $uniqueMunicipalities[] = $municipality;
        }

        // Chunk the data to avoid memory/timeout issues with large datasets
        foreach (array_chunk($uniqueMunicipalities, 500) as $chunk) {
            DB::table('municipalities')->insert($chunk);
        }

        $count = count($uniqueMunicipalities);
        $this->command->info("Seeded municipalities table with {$count} records.");
    }
}

