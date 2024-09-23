@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="document">Documento</label>
            <input type="text" name="document" value="{{ $user->document }}" class="form-control @error('document') is-invalid @enderror" readonly>
            @error('document')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="charge">Cargo</label>
            <input type="text" name="charge" value="{{ $user->charge }}" class="form-control @error('charge') is-invalid @enderror">
            @error('charge')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
