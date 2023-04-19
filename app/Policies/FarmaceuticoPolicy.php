<?php

namespace App\Policies;

use App\Models\Farmaceutico;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FarmaceuticoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Farmaceutico  $farmaceutico
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Farmaceutico $farmaceutico)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->tipo_usuario_id == 3;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Farmaceutico  $farmaceutico
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Farmaceutico $farmaceutico)
    {
        return $user->tipo_usuario_id == 3 || $farmaceutico->id == $user->farmaceutico_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Farmaceutico  $farmaceutico
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Farmaceutico $farmaceutico)
    {
        return $user->tipo_usuario_id == 3;
    }

    // /**
    //  * Determine whether the user can restore the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Farmaceutico  $farmaceutico
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function restore(User $user, Farmaceutico $farmaceutico)
    // {
    //     //
    // }

    // /**
    //  * Determine whether the user can permanently delete the model.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @param  \App\Models\Farmaceutico  $farmaceutico
    //  * @return \Illuminate\Auth\Access\Response|bool
    //  */
    // public function forceDelete(User $user, Farmaceutico $farmaceutico)
    // {
    //     //
    // }
}
