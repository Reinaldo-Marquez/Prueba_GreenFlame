<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
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
        $empresas = Empresa::paginate(10);
        return view('empresas.index')->with('empresas', $empresas);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
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
            if(isset($request->logotipo)){
                $file = $request->file('logotipo');
                $fileName = $file->getClientOriginalName();
                Storage::put(DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . $fileName, file_get_contents($file));  
                Empresa::create([
                    "name" => $request['name'],
                    "email" => $request['email'],
                    "logotipo" => $fileName,
                    "web_site" => $request['web_site'],
                ]);
                return redirect()->action('App\Http\Controllers\EmpresaController@index');
            }
            Empresa::create([
                "name" => $request['name'],
                "email" => $request['email'],
                "web_site" => $request['web_site'],
            ]);
            return redirect()->action('App\Http\Controllers\EmpresaController@index');
        } catch (\Exception $e) {
            return "Usuario no pudo ser creado, el campo nombre es obligatorio.";
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Empresa::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $receta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        // dd($empresa->getUrl());

        return view('empresas.edit', compact('empresa'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $empresa = Empresa::findOrFail($id);
            if(isset($request->logotipo)){
                Storage::delete(DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . $empresa->fileName);
                $file = $request->file('logotipo');
                $fileName = $file->getClientOriginalName();
                Storage::put(DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . $fileName, file_get_contents($file));
                $empresa->logotipo = $fileName;
            }
            $empresa->name = $request['name'];
            $empresa->email = $request['email'];
            $empresa->web_site = $request['web_site'];
            $empresa->save();
            return redirect()->action('App\Http\Controllers\EmpresaController@index');
        } catch (\Exception $e) {
            return "Usuario no pudo ser actualizado, complete todos los datos";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();
        return redirect()->action('App\Http\Controllers\EmpresaController@index');
    }
}
