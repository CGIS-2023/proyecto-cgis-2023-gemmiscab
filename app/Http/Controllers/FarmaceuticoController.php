<?php

namespace App\Http\Controllers;

use App\Models\Farmaceutico;
use Illuminate\Http\Request;

class FarmaceuticoController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(Farmaceutico::class, 'farmaceutico');
    }

    public function index()
    {
        $farmaceuticos = Farmaceutico::paginate(25);
        return view('farmaceuticos.index', ['farmaceuticos' => $farmaceuticos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('farmaceuticos.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'numero_colegiado' => 'required|string',
        ]);
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        $farmaceutico = new Farmaceutico($request->all());
        //$farmaceutico->user_id = $user->id;
        $farmaceutico->save();
        session()->flash('success', 'Farmacéutico creado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('farmaceuticos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $farmaceutico = Farmaceutico::find($id);
        return view('farmaceuticos.show', ['farmaceutico' => $farmaceutico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Farmaceutico $farmaceutico)
    {
        return view('farmaceuticos.edit', ['farmaceutico' => $farmaceutico]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'numero_colegiado' => 'required|string',
        ]);
        // $user = $farmaceutico->user;
        // $user->fill($request->all());
        // $user->save();
        $farmaceutico->fill($request->all());
        $farmaceutico->save();
        session()->flash('success', 'Farmacéutico modificado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('farmaceuticos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if($farmaceutico->delete()) {
        //     session()->flash('success', 'Farmacéutico borrado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        // }
        // else{
        //     session()->flash('warning', 'El farmacéutico no pudo borrarse. Es probable que se deba a que tenga asociada información como citas que dependen de él.');
        // }
        $farmaceutico = Farmaceutico::find($id);
        $farmaceutico->delete();
        return redirect()->route('farmaceuticos.index');
    }
}
