<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
       'App\Persona' => 'App\Policies\ViewPersonas',
       'Spatie\Permission\Models\Role' => 'App\Policies\RolePolicy',
       'App\Producto' => 'App\Policies\ProductoPolicy',
       'App\Factura' => 'App\Policies\VentasPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
