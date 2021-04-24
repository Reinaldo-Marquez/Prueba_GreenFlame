<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\API\PassportAuthController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

//CURD Empresas
Route::get('/empresas', "App\Http\Controllers\EmpresaController@index")->name('index');
Route::get('/empresas/create', "App\Http\Controllers\EmpresaController@create")->name('create');
Route::get('/empresas/{id}', "App\Http\Controllers\EmpresaController@show")->name('show');
Route::post('/empresas', "App\Http\Controllers\EmpresaController@store")->name('store');
Route::get('/empresas/{id}/edit', 'App\Http\Controllers\EmpresaController@edit')->name('edit');
Route::put('/empresas/{id}', "App\Http\Controllers\EmpresaController@update")->name('update');
Route::delete('/empresas/{id}', "App\Http\Controllers\EmpresaController@destroy")->name('destroy');


//CURD Empleados
Route::get('/empleados', "App\Http\Controllers\EmpleadoController@index")->name('empleado.index');
Route::get('/empleados/create', "App\Http\Controllers\EmpleadoController@create")->name('empleado.create');
Route::get('/empleados/{id}', "App\Http\Controllers\EmpleadoController@show")->name('empleado.show');
Route::post('/empleados', "App\Http\Controllers\EmpleadoController@store")->name('empleado.store');
Route::get('/empleados/{id}/edit', 'App\Http\Controllers\EmpleadoController@edit')->name('empleado.edit');
Route::put('/empleados/{id}', "App\Http\Controllers\EmpleadoController@update")->name('empleado.update');
Route::delete('/empleados/{id}', "App\Http\Controllers\EmpleadoController@destroy")->name('empleado.destroy');

Auth::routes();