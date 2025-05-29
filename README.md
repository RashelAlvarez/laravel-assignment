<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Resumen

Aplicación backend de Laravel integrada con la API JSONPlaceholder, utilizando cola de trabajos, cache y vistas con blade.

## Tecnologías Usadas

- Laravel 12 para la creación del proyecto.
- Laravel Sail para crear el entorno de desarrollo con Docker
- MySQL para la persistencia de los datos
- Docker para generar los contenedores y dockerizar la aplicación

## Herramientas

- Git para control de versiones
- Postman para testear API JSONPlaceholder
- WSL para Windows
- VStudioCode como editor de código


## Pasos a seguir
 
- Clonar repositorio https://github.com/RashelAlvarez/laravel-assignment.git

- Variables de entorno:

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

- En la raiz del proyecto ejecutar el siguiente comando para levantar la aplicación en mi caso utilice la consola de Ubuntu:

```bash
   ./vendor/bin/sail up -d
```
- Ejecutar las migraciones: 

```bash
   vendor/bin/sail artisan migrate
```

- FetchCommand: se obtiene listados de users, posts y comments. Luego se crean los registros en la base de datos

(users)

```bash
   vendor/bin/sail artisan fetch:users
```

(posts)


```bash
    vendor/bin/sail artisan fetch:posts
```

(comments)


```bash
    vendor/bin/sail artisan fetch:comments
```

- Comando para ejecutar Queue Job

```bash
    vendor/bin/sail artisan execute:comments-per-user-job
```


```bash
    vendor/bin/sail artisan queue:work
```


## Views Blade

- Listado de users y posts: http://localhost/users
- Listado de posts y comments: http://localhost/posts
- Descarga de archivo JSON: http://localhost/download-page
