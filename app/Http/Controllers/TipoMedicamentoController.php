<?php

namespace App\Http\Controllers;

use App\Models\Tipo_medicamento
use Illuminate\Http\Request;

class TipoMedicamentoController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(TipoMedicamento::class, 'tipo_medicamento');
    }


    public function index()
    {
        $tipo_medicamentos = TipoMedicamentos::paginate(25);
        return view('tipo_medicamentos.index', ['tipo_medicamentos' => $tipo_medicamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
        ], [
            'nombre.required' => 'El tipo de medicamento es obligatorio',
        ]);
        $tipo_medicamento = new Tipo_medicamento($request->all());
        $tipo_medicamento->save();
        session()->flash('success', 'Tipo de medicamento creado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('tipo_medicamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_medicamento = Tipo_medicamento::find($id);
        return view('tipo_medicamentos.show', ['tipo_medicamento' => $tipo_medicamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo_medicamento $tipo_medicamento)
    {
        return view('tipo_medicamento.edit', ['tipo_medicamento' => $tipo_medicamento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipo_medicamento $tipo_medicamento)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
        ]);
        $tipo_medicamento->fill($request->all());
        $tipo_medicamento->save();
        session()->flash('success', 'Tipo de medicamento modificado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('tipo_medicamento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo_medicamento $tipo_medicamento)
    {
        if($tipo_medicamento->delete()) {
            session()->flash('success', 'Tipo de medicamento borrado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'No pudo borrarse el tipo de medicamento.');
        }
        return redirect()->route('tipo_medicamentos.index');

    }
}
