<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalación y despliegue

1. Instalar composer y node.js

https://getcomposer.org/

https://nodejs.org/es/

2. Clonar proyecto

git clone https://github.com/david1066/prueba_grupooet.git

3. Ejectuar los siguientes comandos para instalar las dependencias  

Composer install 

npm install && npm run dev

Nota: sí npm run dev da errores, entonces correr los siguientes comandos

npm install -D tailwindcss@latest postcss@latest autoprefixer@latest
npm run dev

4. Revisamos el archivo .env que tenga correctamente las credenciales (usuario y contraseña)y creamos una base de datos con el nombre acme directamente con el administrador de base de datos.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=acme
DB_USERNAME=root
DB_PASSWORD=

5. Ejecutamos la migraciones que nos creara las tablas.

php artisan migrate

6. Corremos el proyecto con el servidor que viene en composer

php artisan serve

7. en el navegador abrimos la ruta

http://127.0.0.1:8000