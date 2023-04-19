<?php

namespace App\Policies;

use App\Models\Receta;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecetaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */

     public function viewAny(User $user)
     {
         return true;
     }

     /**
      * Determine whether the user can view the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Receta  $receta
      * @return mixed
      */
     public function view(User $user, Receta $receta)
     {
         return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 2 && $receta->paciente_id == $user->paciente->id) || ($user->tipo_usuario_id == 1 && $receta->farmaceutico_id == $user->farmaceutico->id);
     }

     /**
      * Determine whether the user can create models.
      *
      * @param  \App\Models\User  $user
      * @return mixed
      */

     public function create(User $user)
     {
         return true;
     }

     /**
      * Determine whether the user can update the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Receta  $receta
      * @return mixed
      */
     public function update(User $user, Receta $receta)
     {
         return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 2 && $receta->paciente_id == $user->paciente->id) || ($user->tipo_usuario_id == 1 && $receta->farmaceutico_id == $user->farmaceutico->id);
     }

     /**
      * Determine whether the user can delete the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Receta  $receta
      * @return mixed
      */
     public function delete(User $user, Receta $receta)
     {
         return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 2 && $receta->paciente_id == $user->paciente->id) || ($user->tipo_usuario_id == 1 && $receta->farmaceutico_id == $user->farmaceutico->id);
     }

     /**
      * Determine whether the user can restore the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Receta  $Receta
      * @return mixed
      */
     /*
     public function restore(User $user, Receta $receta)
     {
         //
     }
     */
     /**
      * Determine whether the user can permanently delete the model.
      *
      * @param  \App\Models\User  $user
      * @param  \App\Models\Receta  $receta
      * @return mixed
      */

     /*
     public function forceDelete(User $user, Receta $receta)
     {
         //
     }
     */

     public function attach_medicamento(User $user, Receta $receta)
     {
         return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 1 && $receta->farmaceutico_id == $user->farmaceutico->id);
     }

     public function detach_medicamento(User $user, Receta $receta)
     {
         return $user->tipo_usuario_id == 3 || ($user->tipo_usuario_id == 1 && $receta->farmaceutico_id == $user->farmceutico->id);
     }
}
