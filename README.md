#Internshify

Proyecto para la gestión de prácticas en empresas en alumnos de ciclos formativos


## Características

Esta aplicación tendrá login, sistema de autenticación y protección de urls.
Vamos a desarrollar una aplicación de gestión de prácticas, por lo que tendremos que crear
alumnos, empresas, contactos de empresa y llevar un seguimiento del estado de las
prácticas de cada alumno.
Se explicará como crear login, como crear CRUDs sobre entidades y como relacionar datos
entre si.

Se dividirá en diferentes README.md explicando cada paso y comentando el código utilizado.


## Instalación
Para instalar el proyecto hay que seguir los siguientes pasos:

### Clonar repositorio

`git clone https://github.com/curro-gonzalez/internshify.git`

### Configuración de entorno

1. Modificamos el fichero `.env.example` a `.env`
2. Modificamos las propiedades de la base de datos para configurar nuestra propia conexión

### Instalar dependencias

Nos situamos en la carpeta de proyecto y ejecutamos
`composer install`

### Actualización de la base de datos

`php artisan migrate`
