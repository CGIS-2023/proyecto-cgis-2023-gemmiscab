<?php

namespace App\Providers;

use App\Models\Paciente;
use App\Models\Farmaceutico;
use App\Models\Receta;
use App\Models\Medicamento;
use App\Models\Tipo_medicamento;

use App\Policies\FarmaceuticoPolicy;
use App\Policies\MedicamentoPolicy;
use App\Policies\RecetaPolicy;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Receta::class => RecetaPolicy::class,
        Farmaceutico::class => FarmaceuticoPolicy::class,
        Medicamento::class => MedicamentoPolicy::class
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
