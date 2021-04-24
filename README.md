
Pasos para ejecutar el proyecto:

1- Una vez descomprimido el proyecto, lo abrimos en nuestro editor de texto y procedemos a crear una copia del archivo ".env.example" y renombrarla ".env". En este archivo configuraremos nuestras creenciales para acceder a la base de datos.

2- Abriremos una consula en la direccion actual del proyecto y correremos el comando "composer install" para descargar todas las dependencias necesarias.

3- Luego correremos el comando "php artisan migrate --seed" con lo importaremos nuestras tablas y datos a la base de datos.

4- Procedemos a correr el comando "php artisan serve" para levantar el servidor de nuestra aplicacion.

5- Las credenciales para acceder al menu inicial, una vez accedamos a la url del host, son: "email: admin@admin.com" y "password:password".
