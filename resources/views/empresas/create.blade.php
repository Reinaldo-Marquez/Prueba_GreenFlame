@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css" integrity="sha256-yebzx8LjuetQ3l4hhQ5eNaOxVLgqaY1y8JcrXuJrAOg=" crossorigin="anonymous" />
@endsection

@section('content')
    <h2 class="text-center mb-5">Crear nueva empresa</h2>


    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <a href="{{ route('index') }}" class="btn btn-success mb-5">volver al index</a>
            <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Nombre de la empresa:</label>

                    <input type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror "
                        id="name"
                        placeholder="Nombre de empresa"
                        value={{ old('name') }}
                    >

                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="from-group">
                    <label for="titulo">Email de la empresa:</label>

                    <input type="text"
                        name="email"
                        class="form-control @error('name') is-invalid @enderror "
                        id="name"
                        placeholder="Email de empresa"
                        value={{ old('name') }}
                    >

                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="web_site">Sitio web de la empresa:</label>

                    <input type="text"
                        name="web_site"
                        class="form-control @error('web_site') is-invalid @enderror "
                        id="web_site"
                        placeholder="Sitio web de la empresa"
                        value={{ old('web_site') }}
                    >

                    @error('web_site')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="logotipo">Cargar logotipo:</label>

                    <input 
                        id="logotipo" 
                        type="file" 
                        class="form-control @error('logotipo') is-invalid @enderror"
                        name="logotipo",
                    >

                    @error('logotipo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Crear empresa" >
                </div>
            </form>
        </div>
    </div>


@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js" integrity="sha256-2D+ZJyeHHlEMmtuQTVtXt1gl0zRLKr51OCxyFfmFIBM=" crossorigin="anonymous" defer></script>
@endsection