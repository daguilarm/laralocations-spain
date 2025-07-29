<?php

declare(strict_types=1);

namespace Daguilarm\LaralocationsSpain\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LocationsVerifyData extends Command
{
    protected $signature = 'locations:verify-data';
    protected $description = 'Verify and update the municipalities data file against the official INE CSV.';

    public function handle(): int
    {
        $this->info('Starting municipality data verification and update...');

        // Load data from package's PHP file
        $packageDataPath = dirname(__DIR__, 3) . '/database/data/municipalities.php';
        if (!File::exists($packageDataPath)) {
            $this->error('Package data file not found at: ' . $packageDataPath);
            return Command::FAILURE;
        }
        $packageMunicipalitiesArray = require $packageDataPath;
        $packageMunicipalities = collect($packageMunicipalitiesArray)->keyBy('ine_code');
        $this->info(count($packageMunicipalities) . ' municipalities loaded from the package data file.');

        // Load data from INE CSV file
        $ineCsvPath = dirname(__DIR__, 3) . '/ine.csv';
        if (!File::exists($ineCsvPath)) {
            $this->error('INE CSV file not found at: ' . $ineCsvPath);
            return Command::FAILURE;
        }
        $ineMunicipalities = $this->loadIneCsv($ineCsvPath);
        $this->info(count($ineMunicipalities) . ' municipalities loaded from the INE CSV file.');

        $this->line('\n--- Applying Changes ---');
        $changesMade = false;
        $missingMunicipalities = [];

        // 1. Update names and remove obsolete municipalities
        $updatedMunicipalities = $packageMunicipalities->filter(function ($municipality, $ineCode) use ($ineMunicipalities, &$changesMade) {
            if (!isset($ineMunicipalities[$ineCode])) {
                $this->error(sprintf('REMOVED (Obsolete): [%s] - "%s"', $ineCode, $municipality['name']));
                $changesMade = true;
                return false; // Remove from collection
            }

            if ($municipality['name'] !== $ineMunicipalities[$ineCode]) {
                $this->warn(sprintf(
                    'UPDATED: [%s] - "%s" -> "%s"',
                    $ineCode,
                    $municipality['name'],
                    $ineMunicipalities[$ineCode]
                ));
                $changesMade = true;
                $municipality['name'] = $ineMunicipalities[$ineCode];
            }
            return true; // Keep in collection
        });

        // 2. Find municipalities missing from the package
        foreach ($ineMunicipalities as $ineCode => $name) {
            if (!isset($packageMunicipalities[$ineCode])) {
                $missingMunicipalities[$ineCode] = $name;
            }
        }

        if ($changesMade) {
            $this->info('\nSaving updated data file...');
            $this->saveDataToFile($packageDataPath, $updatedMunicipalities->values()->all());
            $this->info('File saved successfully.');
        } else {
            $this->info('\nNo changes were necessary to the main data file.');
        }
        
        // 3. Handle missing municipalities
        $this->line('\n--- Verification Report ---');
        $this->info('\n[1] Checking for municipalities missing from the package file...');
        if (empty($missingMunicipalities)) {
            $this->info('No missing municipalities found.');
        } else {
            foreach ($missingMunicipalities as $ineCode => $name) {
                 $this->error(sprintf('MISSING [%s]: "%s" is in INE file but not in the package.', $ineCode, $name));
            }
            $this->info('\nGenerating auxiliary file for missing municipalities...');
            $this->generateMissingFile($missingMunicipalities);
            $this->info('File ' . realpath(dirname($packageDataPath)) . '/newmunicipalities.php created.');
        }

        $this->info('\nVerification and update process complete.');

        return Command::SUCCESS;
    }

    private function loadIneCsv(string $filePath): array
    {
        $data = [];
        $file = fopen($filePath, 'r');
        if ($file === false) {
            return [];
        }

        fgetcsv($file); // Skip title row
        fgetcsv($file); // Skip header row

        while (($row = fgetcsv($file)) !== false) {
            if (count($row) < 5) continue;
            $provinceCode = str_pad($row[1], 2, '0', STR_PAD_LEFT);
            $municipalityCode = str_pad($row[2], 3, '0', STR_PAD_LEFT);
            $ineCode = $provinceCode . $municipalityCode;
            $name = $row[4];
            $data[$ineCode] = $name;
        }

        fclose($file);
        return $data;
    }

    private function saveDataToFile(string $path, array $data): void
    {
        $content = "<?php\n\nreturn [\n";
        foreach ($data as $municipality) {
            $content .= "   ['province_id' => ". $municipality['province_id'] . ", 'ine_code' => '" . $municipality['ine_code'] . "',   'lat' => '" . $municipality['lat'] . "', 'lng' => '" . $municipality['lng'] . "', 'name' => '" . addslashes($municipality['name']) . "', 'created_at' => now(), 'updated_at' => now()],\n";
        }
        $content .= "];\n";

        File::put($path, $content);
    }

    private function generateMissingFile(array $missingData): void
    {
        $path = dirname(__DIR__, 3) . '/database/data/newmunicipalities.php';
        $content = "<?php\n\n// Municipalities to be added manually after filling in the missing data (lat, lng).\nreturn [\n";

        foreach ($missingData as $ineCode => $name) {
            $provinceId = (int)substr((string)$ineCode, 0, 2);
            $content .= "   ['province_id' => ". $provinceId . ", 'ine_code' => '" . $ineCode . "',   'lat' => '', 'lng' => '', 'name' => '" . addslashes($name) . "', 'created_at' => now(), 'updated_at' => now()],\n";
        }

        $content .= "];\n";

        File::put($path, $content);
    }
}