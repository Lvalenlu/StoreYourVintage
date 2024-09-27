@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nueva Categoría</h2>

    {{-- Verifica si hay errores de validación y los muestra en un mensaje --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulario para crear una nueva categoría --}}
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre de la categoría</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        {{-- Botón para enviar el formulario y crear la nueva categoría --}}
        <button type="submit" class="btn btn-primary">Crear Categoría</button>
    </form>
</div>
@endsection
