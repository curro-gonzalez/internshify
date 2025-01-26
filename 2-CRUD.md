## Creación de un CRUD

Siempre vamos a seguir los mismos pasos. Sin embargo, Laravel ofrece algunos atajos que puede
dar la sensación de que *AHORRAMOS PASOS*. Sin embargo siempre son los mismos. El punto 6
nos mostrará una forma rápida de abordar los cinco primeros, pero es importante saber que
se hace en cada paso antes de hacerlo directamente.

### 1. Definición de nuestro modelo de datos

Tenemos que pensar que columnas va a necesitar nuestra entidad.


### 2. Creación del modelo en Laravel.

Para crear el modelo en Laravel tenemos que hacer lo siguiente:
1. Crear la clase en app/Models/
2. Crear la migración que creará realmente la tabla en BD
3. Ejecutar la migración para persistir los datos en nuestra BD.

*SIEMPRE* son estos pasos, pero veremos diferentes formas de hacerlos:

#### 2.1 Forma paso a paso

`php artisan make:model Entidad`
Creamos la clase __Entidad__

`php artisan make:migration create_entidad_table`
Esto nos creará *el fichero de migración*, donde tendremos que añadir nuestras columnas.
*IMPORTANTE*, el nombre de la migración debe ser SIEMPRE create_{nombredetuentidad}_table, es
una convención de Laravel.

`php artisan migrate`
Esto ejecutará la migración en la bd, creando las tablas y modificando la base de datos.

#### 2.2 Forma con atajo

Como hemos visto, el nombre de la migración del comando `make:migration` debe seguir una convención
especial. Como esto da lugar a errores, Laravel propone el siguiente comando:

`php artisan make:model Entidad -m`
Con el `-m`, Laravel nos crea el fichero de migración junto con la clase, todo en un paso.
Es más recomendable usar este comando, ya que evitamos errores y nos ahorramos pasos.


### 3. Creación del controlador en Laravel 

`php artisan make:controller EntidadController`
Esto creará una clase llamada EntidadController, que estará *vacía*.

`php artisan make:controller EntidadController --resource`
Sin embargo este último creará la clase, *pero creando los métodos necesarios para el CRUD automáticamente*

En cada método hacemos el `return view('nombreblade')` al que nos dirigiremos en cada caso.


### 4. Creación de las rutas

En el fichero `web.php` tendremos que crear las rutas para gestionar nuestro CRUD.

```php
use App\Http\Controllers\EntidadController;

// Mostrar todas las entidades
Route::get('/entidades', [EntidadController::class, 'index'])->name('entidades.index');

// Mostrar el formulario para crear una nueva entidad
Route::get('/entidades/create', [EntidadController::class, 'create'])->name('entidades.create');

// Guardar una nueva entidad
Route::post('/entidades', [EntidadController::class, 'store'])->name('entidades.store');

// Mostrar una entidad específica
Route::get('/entidades/{id}', [EntidadController::class, 'show'])->name('entidades.show');

// Mostrar el formulario para editar una entidad
Route::get('/entidades/{id}/edit', [EntidadController::class, 'edit'])->name('entidades.edit');

// Actualizar una entidad
Route::put('/entidades/{id}', [EntidadController::class, 'update'])->name('entidades.update');

// Eliminar una entidad
Route::delete('/entidades/{id}', [EntidadController::class, 'destroy'])->name('entidades.destroy');

```

Siempre se usan las mismas convenciones de nombres (el nombre de la entidad en plural) y los mismos `->name('')`,
por lo que Laravel propone la versión simplificada, que hace *exactamente lo mismo de arriba*

```php 
Route::resource('entidades', EntidadController::class);
```

### 5. Creación de los blade

Ahora solo tenemos que crear nuestros ficheros `.blade`. Sin embargo, a partir de ahora hay que
seguir una convención nueva. *Todos los blades* relacionados con una entidad tienen que ir
agrupados en una carpeta dentro de `resources/view`.
En este caso, la carpeta sería `entidades`


### 6. Versión extra simplificada.

`php artisan make:model Entidad -mcr`
Este comando realiza las siguientes operaciones:
- Crea la clase Entidad
- Crea el fichero de migración
- Crea el controlador con todos los métodos

Por último solo tendríamos que añadir a nuestro `web.php` lo siguiente:

```php 
Route::resource('entidades', EntidadController::class);
```

Y ya solo tendríamos que crear la carpeta `entidades` en `resources/views` y crear los blade.
