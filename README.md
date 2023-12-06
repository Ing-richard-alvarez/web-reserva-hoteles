
# Sistema de reserva de Hoteles

Este es un sistema para realizar reservas en hoteles y tener las funciones necesarias para la creación, modificación de hoteles y sus reservas dentro del sistema


## Requerimientos para correr el proyecto localmente

    1. Tener composer instalado
    2. Tener instalado algún manejador de 
        paquete de node puede ser npm ó yarn
    3. Tener alguna herramienta que permita configurar
        servidor de bases de datos, apache entre otros
        pueden descargar xampp, laragon etc



## Instalación de dependencias para ejecutar el proyecto

    1. abrir una terminal cmd o bash de linux
    2. acceder a la ubicación del proyecto 
 
 Procedemos a ejecutar unas series de comandos para
 instalar las dependencias

```bash
  composer install
```

luego instalamos todas las dependencias de nodejs que 
necesita nuestro con el siguiente comando:
```bash
  npm install
```
 en este punto ya tenemos todas las dependencias instaladas

    
## Configurar bases de datos

Primeramente debemos clonar el archivo .env.example y
renombrarlo por .env, luego de eso procedemos a modificar las siguientes variables de entorno.

`DB_CONNECTION`

`DB_HOST`

`DB_PORT`

`DB_DATABASE`

`DB_USERNAME`

`DB_PASSWORD`

una vez usted haya configurado su servidor de bases de datos y haya modificado las variables de entorno, 
procedemos a correr las migraciones de las tablas configuradoel siguiente comando

```bash
  php artisan migrate
```
## Compilar Assets
 Para poder compilar los assets (css, js, sass) necesitamos correr el siguiente comando

 ```bash
  npm run dev
```

si usted quiere modificar el proyecto y no quiere compilar cada ves que realice un cambio usted puede ejecutar 

```bash
  npm run watch
```
## Ejecutar el servidor de laravel

Para correr el proyecto con laravel debe ejecutar el siguiente comando:

```bash
  php artisan serve
```

## Sugerencias

cuando haya llegado a este punto usted ya ha sido capaz de correr el proyecto y para esto si usted quiere seguir trabajando en este repositorio le recomendamos trabajar de la siguiente manera:

1. abrir una terminal para ejecutar 
```bash
  npm run watch
```
2. abrir una segunda terminal para ejecutar laravel con el siguiente comando
```bash
  php artisan serve
```

antes de haber hecho esto, usted ha devido de iniciar el servidor de mysql y el de apache