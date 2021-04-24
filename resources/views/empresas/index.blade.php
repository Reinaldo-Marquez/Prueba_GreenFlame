@extends('layouts.app')

@section('content')
<h2 class="text-center mb-5">Empresas</h2>
<div class="col-md-10 mx-auto bg-white p-3">
        <a href="{{ route('create') }}" class="btn btn-success mb-5">Crear Empresa</a>
        <a href="/empleados" class="btn btn-primary mb-5">Empleados</a>
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Email</th>
                    <th scole="col">Logotipo</th>
                    <th scole="col">Sitio web</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($empresas as $empresa)
                    <tr>
                        <td> {{$empresa->name}} </td>
                        <td> {{$empresa->email}} </td>
                        <td> {{$empresa->logotipo}} </td>
                        <td> {{$empresa->web_site}} </td>
                        <td>
                            <form action="{{ route('destroy', ['id' => $empresa->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger d-block mb-2 w-100" value="Eliminar &times;">
                            </form>
                            <a href="{{ route('edit', ['id' => $empresa->id]) }}" class="btn btn-dark d-block mb-2">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection