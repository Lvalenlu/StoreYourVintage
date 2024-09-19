@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Auditoria</h2>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($audits as $audit)
            <tr>
                <td>{{ $audit->id }}</td>
                <td>{{ $audit->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
