<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## Paquetes instalados: composer y npm
1. fruitcake/laravel-cors: ^2.0
2. guzzlehttp/guzzle: ^7.0.1
3. laravel/fortify: ^1.13
4. laravel/framework: ^8.75
5. laravel/sanctum: ^2.11
6. laravel/tinker: ^2.5
7. laravel/ui: ^3.4
8. @popperjs/core: ^2.10.2
9. axios:^0.21
10. bootstrap: ^5.1.3
11. laravel-mix: ^6.0.6
12. lodash: ^4.17.19
13. postcss: ^8.1.14
14. resolve-url-loader: ^3.1.2
15. sass: ^1.32.11
16. sass-loader: ^11.0.1
17. vue: ^2.6.12
18. vue-loader: ^15.9.8
19. vue-template-compiler: ^2.6.12

## Funcionalidades

1. La eliminación está por softdelete, no sé eliminan los datos.
2. Los modelos(color, tipodocumento, ciudad, tipovehiculo) se cargan en caché para no estar consultando tanto en base de datos.
3. Cuando se va a eliminar un vehículo, muestra un modal para confirmar la eliminación o cancelarla.
4. Cuando se trae un vehículo o un usuario por ID, sé utiliza la estructura whereraw(id = ?,$id) para prevenir injection SQL.
5. Se creó un login con el paquete FORTIFY y la vistas de laravel UI.
6. Se validan los campos con la librería VALIDATOR.
7. La barra de navegación esta visible todo el tiempo cuando el usuario esta logueado.
8. El sistema no permite duplicados por documento y por placa.

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