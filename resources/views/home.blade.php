@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Principal') }}</div>
                <!-- Verifica si hay un mensaje de sesión llamado 'status' -->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <!-- Mensaje de confirmación para el usuario -->
                    {{ __('Ya estas logueado ^^') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
