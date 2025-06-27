<?php

declare(strict_types=1);

namespace Daguilarm\LaralocationsSpain;

use Illuminate\Support\ServiceProvider;

class LaralocationsSpainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 1. Publicar migraciones
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'laralocations-spain');

        // 2. Publicar seeders
        $this->publishes([
            __DIR__.'/../database/seeders' => database_path('seeders'),
        ], 'laralocations-spain');

        // 3. Publicar archivos de datos
        $this->publishes([
            __DIR__.'/../database/data' => database_path('data'),
        ], 'laralocations-spain-data');
    }
}
