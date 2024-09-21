@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="subtitulo">Listado de Auditorias</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripcion</th>
                <th>Razon</th>
                @if ($user->is_manager == 1)
                <th>Administrador</th>
                @endif
                <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($audits as $audit)
            <tr>
                <td>{{ $audit->id }}</td>
                <td>{!! nl2br($audit->description) !!}</td>
                <td>{{ $audit->reason }}</td>
                @if ($user->is_manager == 1)
                    <td>{{$audit->users->name}}</td>
                @endif
                <td>{{ $audit->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
