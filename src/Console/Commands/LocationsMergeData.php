<?php

namespace Daguilarm\LaralocationsSpain\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LocationsMergeData extends Command
{
    protected $signature = 'locations:merge-data';
    protected $description = 'Merges new municipalities into the main data file.';

    public function handle(): int
    {
        $this->info('Starting file merge process...');

        $mainPath = dirname(__DIR__, 3) . '/database/data/municipalities.php';
        $newPath = dirname(__DIR__, 3) . '/database/data/newmunicipalities.php';

        if (!File::exists($mainPath) || !File::exists($newPath)) {
            $this->error('One or both data files not found.');
            return Command::FAILURE;
        }

        $municipalities = require $mainPath;
        $newMunicipalities = require $newPath;

        $all = array_merge($municipalities, $newMunicipalities);

        usort($all, fn($a, $b) => $a['ine_code'] <=> $b['ine_code']);

        $content = "<?php\n\nreturn [\n";
        foreach ($all as $municipality) {
            $name = addslashes($municipality['name']);
            $content .= "   ['province_id' => ". $municipality['province_id'] . ", 'ine_code' => '" . $municipality['ine_code'] . "',   'lat' => '" . $municipality['lat'] . "', 'lng' => '" . $municipality['lng'] . "', 'name' => '" . $name . "', 'created_at' => now(), 'updated_at' => now()],\n";
        }
        $content .= "];\n";

        File::put($mainPath, $content);
        $this->info('Main municipalities file updated successfully.');

        File::delete($newPath);
        $this->info('newmunicipalities.php file has been deleted.');

        return Command::SUCCESS;
    }
}
