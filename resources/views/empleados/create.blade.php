@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection

@section('content')
    <h2 class="text-center mb-5">Crear nuevo empleado</h2>


    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <a href="{{ route('empleado.index') }}" class="btn btn-success mb-5">volver al index</a>
            <form method="POST" action="{{ route('empleado.store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Nombre del empleado:</label>

                    <input type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror "
                        id="name"
                        placeholder="Nombre del empleado"
                        value={{ old('name') }}
                    >

                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="titulo">Apellido del empleado:</label>

                    <input type="text"
                        name="lastname"
                        class="form-control @error('lastname') is-invalid @enderror "
                        id="lastname"
                        placeholder="Apellido del empleado"
                        value={{ old('lastname') }}
                    >

                    @error('lastname')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="from-group">
                    <label for="empresa_id">Empresa</label>

                    <select
                        name="empresa_id"
                        class="form-control @error('empresa_id') is-invalid @enderror "
                        id="empresa_id"
                    >
                        <option value="">-- Seleccione --</option>
                        @foreach ($empresas as $empresa)
                            <option 
                                value="{{ $empresa->id }}" 
                                {{ old('empresas') == $empresa->name ? 'selected' : '' }} 
                            >{{$empresa->name}}</option>
                        @endforeach
                    </select>

                    @error('categoria')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="from-group">
                    <label for="titulo">Email del empleado:</label>

                    <input type="text"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror "
                        id="email"
                        placeholder="Email del empleado"
                        value={{ old('email') }}
                    >

                    @error('email')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="web_site">Telefono del empleado:</label>

                    <input type="text"
                        name="phone"
                        class="form-control @error('phone') is-invalid @enderror "
                        id="phone"
                        placeholder="Telefono del empleado"
                        value={{ old('phone') }}
                    >

                    @error('phone')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Crear empleado" >
                </div>
            </form>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection