<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'tipo_usuario_id' => 'required|numeric',
        ]);

        $tipo_usuario_id = intval($request->tipo_usuario_id);
        if($tipo_usuario_id == 1){
            //Farmacéutico
            $reglas_farmaceutico = ['numero_colegiado' => 'required|string'];
            $rules = array_merge($reglas_farmaceutico, $rules);
        }
        elseif($tipo_usuario_id == 2){
            //Paciente
            $reglas_paciente = ['nuhsa' => ['required', 'string', 'max:12', 'min:12', new Nuhsa()]];
            $rules = array_merge($reglas_paciente, $rules);
        }
        $request->validate($rules);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($tipo_usuario_id == 1) {
            //Farmacéutico
            $farmaceutico = new Farmaceutico($request->all());
            $farmaceutico->user_id = $user->id;
            $farmaceutico->save();
        }
        elseif($tipo_usuario_id == 2){
            //Paciente
            $paciente = new Paciente($request->all());
            $paciente->user_id = $user->id;
            $paciente->save();
        }
        $user->fresh();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
