<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('empresas', function (Request $request) {
    try {
        $file = $request->file('logotipo');
        $fileName = $file->getClientOriginalName();
        Storage::put(DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . $fileName, file_get_contents($file));  
        return Empresa::create([
            "name" => $request['name'],
            "email" => $request['email'],
            "logotipo" => $fileName,
            "web_site" => $request['web_site'],
        ]);
    } catch (\Exception $e) {
        return "Usuario no pudo ser creado, verifique todos los datos";
    }
});

Route::delete('empresas/{id}', function ($id) {
    $empresa = Empresa::findOrFail($id);
    $empresa->delete();
    return $empresa;
});
