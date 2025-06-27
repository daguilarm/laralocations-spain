# Laralocations-Spain

Este paquete de Laravel proporciona una base de datos completa de las divisiones administrativas de España, incluyendo:

* **Comunidades Autónomas (CCAA):** Las 17 comunidades autónomas de España.
* **Provincias:** Las 50 provincias de España.
* **Municipios:** Los municipios de cada provincia (8112 municipios en total).
* **Ceuta** y **Melilla**, usando el formato del INE, asingados tanto a Provincia como a Municipio.


## Instalación

Puedes instalar el paquete a través de Composer:

```bash
composer require daguilarm/laralocations-spain
```

## Configuración

El paquete incluye un Service Provider que se auto-detecta en Laravel. No es necesario añadirlo manualmente.

Después de la instalación, debes publicar las migraciones y el archivo de datos de municipios:

```bash
php artisan vendor:publish --provider="Daguilarm\LaralocationsSpain\LaralocationsSpainServiceProvider" --tag="laralocations-spain"
```

Esto copiará los archivos de migración y seeders a tus directorios database/migrations y database/seeders respectivamente.

## Migraciones y Seeders

Primero añade los seeders a tu DatabaseSeeder.php:

```php 
// Seeders del paquete \Daguilarm\LaralocationsSpain
CountrySeeder::class,
StateSeeder::class,
ProvinceSeeder::class,
MunicipalitySeeder::class,
```

Para crear las tablas en tu base de datos y poblarlas con los datos, ejecuta:

```bash
php artisan migrate --seed
```

Yo personalmente uso (se prudente al usarlo...):

```bash
php artisan migrate:refresh --seed
```

Nota: El seeder de municipios puede tardar algunos segundos más en completarse, debido a la gran cantidad de datos.

## Uso

El paquete crea cuatro tablas en tu base de datos:

- countries: Aunque el paquete se enfoca en España, esta tabla almacena los datos de España como país, por consistencia y posible futura expansión.
- states: Almacena las Comunidades Autónomas (CCAA).
- provinces: Almacena las provincias, con una relación a la CCAA a la que pertenecen.
- municipalities: Almacena los municipios, con una relación a la provincia a la que pertenecen.

## Contribución

¡Las contribuciones son bienvenidas! Si encuentras errores, tienes sugerencias o quieres añadir funcionalidad, por favor, abre un "issue" o envía un "pull request" en el repositorio de GitHub.

## Licencia

Este paquete está licenciado bajo la Licencia MIT. Consulta el archivo LICENSE para más detalles.

## Datos

Los datos incluidos en este paquete provienen de fuentes oficiales del gobierno de España, incluyendo el INE (Instituto Nacional de Estadística). 

> [!NOTE] 
> Estos datos fueron recopilados en el año 2017 para un proyecto universitario (tesis doctoral), y por tanto, al recopilarse a mano seguramente estaban llenos de errores (no había IA por aquel entonces que hicieran estas cosas...). Para actualizarlos y ponerlos al día, he utilizado Google Gemini para que los validase y buscara errores. Para ello ha utilizando la base de datos del INE. El resultado han sido 19 errores en entre los más de 8100 municipios que hay en la base de datos. Muchos menos errores de los que esperaba, pero en cualquier caso, son sólo los errores que ha visto un programa de inteligencia artificial...

> [!IMPORTANT] 
> En cualquier caso, seguramente se encontrarán más errores o discrepancias, por lo que estaría bien abrir un "issue" o envíar un "pull request" al repositorio, y colaborar con el proyecto. Muchas gracias.

