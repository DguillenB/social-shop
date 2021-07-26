# social-shop
***
App para listar tiendas cercanas

## Table of Contents
1. [Información General](#general-info)
2. [Tecnologías](#technologies)
3. [Instalación](#installation)
***
<a name="general-info"></a>
### Información General
El objetivo del ejercicio es implementar una app que liste tiendas cercanas

#### _Especificaciones_
* _Como un usuario, puedo registrarme usando mi email y contraseña_
* _Como un usuario, puedo conectarme usando mi email y contraseña_
* _Como un usuario, puedo mostrar el listado de tiendas ordenadas por
distancia_
* _Como un usuario, puedo hacer “me gusta” en una tienda, por lo que puede
ser añadida a la lista de mis tiendas favoritas_
* _Nota: las tiendas favoritas no deben ser mostradas en la pantalla
principal_
#### _Elementos extra_
* _[BONUS] Como usuario, puedo listar la lista de tiendas favoritas_
* _[BONUS] Como usuario, puedo eliminar una tienda de la lista de tiendas
favoritas_
* _[BONUS] Como usuario, puedo excluir una tienda, que no será mostrada
en la lista de “Tiendas Cercanas” durante las siguientes dos horas_

***
<a name="technologies"></a>
## Tecnologías
Los lenguajes y tecnologías empleados para el desarrollo de este software han sido:
* Framework Laravel 7
* PHP 7.3.21
* MySQL 5.7.31
* HTML5
* CSS3
* JavaScript
* jQuery
* Bootstrap

Este software ha sido desarrollado en un servidor con Apache v.2.4.46.

<a name="installation"></a>
## Instalación

Clona el respositorio o descarga las fuentes
```
git clone git@github.com:DguillenB/social-shop.git
```
Posicionate en el directorio de las fuentes y **actualiza las dependencias** usando composer
```
cd [path directory]
composer install
```
Haz una copia del archivo **.env.example** con el nombre de **.env** y actualizalo con los datos de la configuración.

Genera una nueva **application key** y copialo en el archivo .env
```
php artisan key:generate
```
**Crea la base de datos** utilizada para el proyecto, nombre sugerido "socialshop", genera un usuario y contraseña y configura los datos relativos a la DB en el archivo .env
- Nota: puedes utilizar el archivo database.sql de la distribución para la creación de la base de datos.

Una vez este configurada la información de la base de datos en el archivo .env **ejecuta las migraciones**:
```
php artisan migrate
```
Con el único objetivo de tener algunos datos de pruebas se puede **ejecutar el seed** para cargar algunas tiendas en la base de datos:
```
php artisan make:seed shops_seed
```
Una vez realizada la instalación si accedes a: [URL Proyecto]/register podrás crearte un usuario de acceso a la aplicación.

Para mas información sobre el deployment de Laravel 7 puedes consultar: 
https://laravel.com/docs/7.x/deployment
