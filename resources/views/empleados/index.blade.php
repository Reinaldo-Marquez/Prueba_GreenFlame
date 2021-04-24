@extends('layouts.app')

@section('content')
<h2 class="text-center mb-5">Empleados</h2>
<div class="col-md-10 mx-auto bg-white p-3">
        <a href="{{ route('empleado.create') }}" class="btn btn-success mb-5">Crear Empleado</a>
        <a href="/empresas" class="btn btn-primary mb-5">Empresas</a>

        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole="col">Nombre</th>
                    <th scole="col">Apellido</th>
                    <th scole="col">Empresa</th>
                    <th scole="col">Email</th>
                    <th scole="col">Telefono</th>
                    <th scole="col">Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($empleados as $empleado)
                    <tr>
                        <td> {{$empleado->name}} </td>
                        <td> {{$empleado->lastname}} </td>
                        <td> {{$empleado->empresa->name}} </td>
                        <td> {{$empleado->email}} </td>
                        <td> {{$empleado->phone}} </td>
                        <td>
                            <form action="{{ route('empleado.destroy', ['id' => $empleado->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger d-block mb-2 w-100" value="Eliminar &times;">
                            </form>
                            <a href="{{ route('empleado.edit', ['id' => $empleado->id]) }}" class="btn btn-dark d-block mb-2">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection