<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Farmaceutico;
use App\Models\Paciente;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class RecetaController extends Controller
{
    public function __construct()
    {
       // $this->authorizeResource(Cita::class, 'cita');
    }

    public function index()
    {
        $recetas = Receta::orderBy('fecha', 'desc')->paginate(25);
        if(Auth::user()->tipo_usuario_id == 1){
            $recetas = Auth::user()->farmaceutico->recetas()->orderBy('fecha', 'desc')->paginate(25);
        }
        elseif(Auth::user()->tipo_usuario_id == 2){
            $recetas = Auth::user()->paciente->recetas()->orderBy('fecha', 'desc')->paginate(25);
        }
        return view('recetas.index', ['recetas' => $recetas]);
    }

    public function create()
    {
        $farmaceuticos = Farmaceutico::all();
        $pacientes = Paciente::all();
        if(Auth::user()->tipo_usuario_id == 1){
            return view('recetas.create', ['farmaceutico' => Auth::user()->farmaceutico, 'pacientes' => $pacientes]);
        }
        elseif(Auth::user()->tipo_usuario_id == 2) {
            return view('recetas.create', ['paciente' => Auth::user()->paciente, 'farmaceuticos' => $farmaceuticos]);
        }
        return view('recetas.create', ['pacientes' => $pacientes, 'farmaceuticos' => $farmaceuticos]);
    }

    public function store(Request $request)
    {
        $reglas = [
            'fecha' => 'required|date|after:yesterday',
            'farmaceutico_id' => 'required|exists:farmaceuticos,id',
        ];
        if(Auth::user()->tipo_usuario_id == 2){
            $reglas_paciente = ['paciente_id' => ['required', 'exists:pacientes,id', Rule::in(Auth::user()->paciente->id)]];
            $reglas = array_merge($reglas_paciente, $reglas);
        }
        else{
            $reglas_generales = ['paciente_id' => ['required', 'exists:pacientes,id']];
            $reglas = array_merge($reglas_generales, $reglas);
        }
        $this->validate($request, $reglas);
        $receta = new Receta($request->all());
        $receta->save();
        session()->flash('success', 'Receta creada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('recetas.index');
    }

    public function show(Receta $receta)
    {
        return view('recetas.show', ['receta' => $receta]);
    }

    public function edit(Receta $receta)
    {
        //Le paso a la vista los medicamentos porque permito añadir una prescripción desde esa misma vista
        $medicamentos = Medicamento::all();
        $farmaceuticos = Farmaceutico::all();
        $pacientes = Paciente::all();
        if(Auth::user()->tipo_usuario_id == 1){
            return view('recetas.edit', ['receta' => $receta, 'farmaceutico' => Auth::user()->farmaceutico, 'pacientes' => $pacientes, 'medicamentos' => $medicamentos]);
        }
        elseif(Auth::user()->tipo_usuario_id == 2) {
            return view('recetas.edit', ['receta' => $receta, 'paciente' => Auth::user()->paciente, 'farmaceuticos' => $farmaceuticos, 'medicamentos' => $medicamentos]);
        }
        return view('recetas.edit', ['receta' => $receta, 'pacientes' => $pacientes, 'farmaceuticos' => $farmaceuticos, 'medicamentos' => $medicamentos]);
    }

    public function update(Request $request, Receta $receta)
    {
        $reglas = [
            'fecha' => 'required|date|after:yesterday',
            'farmaceutico_id' => 'required|exists:farmaceuticos,id',
        ];
        if(Auth::user()->tipo_usuario_id == 2){
            $reglas_paciente = ['paciente_id' => ['required', 'exists:pacientes,id', Rule::in(Auth::user()->paciente->id)]];
            $reglas = array_merge($reglas_paciente, $reglas);
        }
        else{
            $reglas_generales = ['paciente_id' => ['required', 'exists:pacientes,id']];
            $reglas = array_merge($reglas_generales, $reglas);
        }
        $this->validate($request, $reglas);
        $receta->fill($request->all());
        $receta->save();
        session()->flash('success', 'Receta modificada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('recetas.index');
    }

    public function destroy(Receta $receta)
    {
        if($receta->delete()) {
            session()->flash('success', 'Receta borrada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'La receta no pudo borrarse. Es probable que se deba a que tenga asociada información como pacientes que dependen de ella.');
        }
        return redirect()->route('recetas.index');
    }

    public function attach_medicamento(Request $request, Receta $receta)
    {
        $this->validateWithBag('attach',$request, [
            'medicamento_id' => 'required|exists:farmaceuticos,id',
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio',
            'comentarios' => 'nullable|string',
            'tomas_dia' => 'required|numeric|min:0',
        ]);
        $cita->medicamentos()->attach($request->medicamento_id, [
            'inicio' => $request->inicio,
            'fin' => $request->fin,
            'comentarios' => $request->comentarios,
            'tomas_dia' => $request->tomas_dia
        ]);
        return redirect()->route('recetas.edit', $receta->id);
    }

    public function detach_medicamento(Receta $receta, Medicamento $medicamento)
    {
        $receta->medicamentos()->detach($medicamento->id);
        return redirect()->route('recetas.edit', $receta->id);
    }
}
