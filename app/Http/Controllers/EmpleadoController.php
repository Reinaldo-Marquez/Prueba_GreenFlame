<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpleadoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::paginate(10);
        return view('empleados.index')->with('empleados', $empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();

        return view('empleados.create')->with('empresas', $empresas);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Empleado::create([
                "name" => $request['name'],
                "lastname" => $request['lastname'],
                "empresa_id" => $request['empresa_id'],
                "email" => $request['email'],
                "phone" => $request['phone'],
            ]);
            return redirect()->action('App\Http\Controllers\EmpleadoController@index');
        } catch (\Exception $e) {
            return "Usuario no pudo ser creado, el campo nombre y apellido son obligatorios.";
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Empleado::findOrFail($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empresas = Empresa::all();

        return view('empleados.edit', compact('empleado', 'empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $empleado = Empleado::findOrFail($id);
            $empleado->name = $request['name'];
            $empleado->lastname = $request['lastname'];
            $empleado->empresa_id = $request['empresa_id'];
            $empleado->email = $request['email'];
            $empleado->phone = $request['phone'];
            $empleado->save();
            return redirect()->action('App\Http\Controllers\EmpleadoController@index');
        } catch (\Exception $e) {
            return "Usuario no pudo ser actualizado, complete todos los datos";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->action('App\Http\Controllers\EmpleadoController@index');
    }
}
