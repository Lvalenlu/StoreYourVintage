<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registra cualquier servicio de la aplicación.
     * Este método se usa para enlazar servicios dentro del contenedor de servicios de Laravel.
     */
    public function register(): void
    {
        // Aquí puedes registrar servicios, bindings o realizar configuraciones para la aplicación.
    }

    /**
     * Arranca cualquier servicio de la aplicación.
     * Este método se usa para ejecutar cualquier proceso necesario cuando los servicios de la aplicación están listos.
     */
    public function boot(): void
    {
        // Aquí puedes realizar tareas como definir reglas de validación personalizadas, registrar vistas, etc.
    }
}
