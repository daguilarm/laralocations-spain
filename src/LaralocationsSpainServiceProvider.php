<?php

declare(strict_types=1);

namespace Daguilarm\LaralocationsSpain;

use Illuminate\Support\ServiceProvider;

/**
 * Laravel package for Spanish locations.
 * 
 * @Package: Daguilarm/LaralocationsSpain
 * @File: Daguilarm/LaralocationsSpain/src/LaralocationsSpainServiceProvider.php
 * @author Damián Aguilar - damian.aguilarm@gmail.com
 * @version 1.0.1
 * @since 1.0.0
 */
class LaralocationsSpainServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Ruta base del paquete (src/../)
        $packageBase = dirname(__DIR__);

        // Publicar migraciones
        $this->publishes([
            $packageBase . '/database/migrations' => database_path('migrations'),
        ], 'laralocations-spain');

        // Publicar seeders
        $this->publishes([
            $packageBase . '/database/seeders' => database_path('seeders'),
        ], 'laralocations-spain');

        // Publicar archivos de datos
        $this->publishes([
            $packageBase . '/database/data' => database_path('data'),
        ], 'laralocations-spain');
    }
}