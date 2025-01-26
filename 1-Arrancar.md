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
