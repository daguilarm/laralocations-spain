# Laralocations-Spain

Este paquete de Laravel proporciona una base de datos completa de las divisiones administrativas de España, incluyendo:

* **Comunidades Autónomas (CCAA):** Las 17 comunidades autónomas de España.
* **Provincias:** Las 50 provincias de España.
* **Municipios:** Los municipios de cada provincia (8112 municipios en total).

## Instalación

Puedes instalar el paquete a través de Composer:

```bash
composer require daguilarm/laralocations-spain
```

## Configuración

El paquete incluye un Service Provider que se auto-detecta en Laravel. No es necesario añadirlo manualmente.

Después de la instalación, debes publicar las migraciones y los seeders:

```bash
php artisan vendor:publish --tag=laralocations-spain
```

Esto copiará los archivos de migración y seeders a tus directorios database/migrations y database/seeders respectivamente.

## Migraciones y Seeders

Para crear las tablas en tu base de datos y poblarlas con los datos, ejecuta:

```bash
php artisan migrate
php artisan db:seed --class=LaralocationsSpainSeeder
```

El LaralocationsSpainSeeder ejecutará a su vez otros seeders para cada nivel administrativo. Si deseas ejecutar seeders individuales:

- Para CCAA: `php artisan db:seed --class=CommunitySeeder`
- Para Provincias: `php artisan db:seed --class=ProvinceSeeder`
- Para Municipios: `php artisan db:seed --class=MunicipalitySeeder`

Nota: El seeder de municipios puede tardar bastante tiempo en completarse debido a la gran cantidad de datos.

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
> Estos datos fueron recopilados 2017 años para un proyecto universitario, y por tanto, al recopilarse a mano seguramente estaban llenos de errores (no había IA por aquel entonces que hicieran estas cosas...). Para actualizarlos, he utilizado Google Gemini para que los validase y buscara errores, utilizando la base de datos del INE para la comprobación. El resultado han sido 19 errores en entre los más de 8100 municipios que hay en la base de datos. 

> [!IMPORTANT] 
> En cualquier caso, seguramente se encontrarán más errores o discrepancias, por lo que estaría bien abrir un "issue" o envíar un "pull request" al repositorio, y colaborar con el proyecto. Muchas gracias.

