@extends('layouts.app') <!-- Asegúrate de que extiendes del layout correcto -->

@section('content')

<div class="table-responsive">
    <table  class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Administrador</th>
                <th scope="col">Descripción</th>
                <th scope="col">Cambio</th>
                <th scope="col">Usuario afectado</th>
                <th scope="col">Fecha</th>
                <th scope="col">Razones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audit as $audit)
            <tr class="">
                {{-- <td scope="row">{{$audit->users_id}}</td>
                <td scope="row">{{$audit->description}}</td>
                <td scope="row">{{$audit->type}}</td>
                <td scope="row">{{$audit->customer_id}}</td>
                <td scope="row">{{$audit->created_at}}</td>
                <td scope="row">{{$audit->reasons}}</td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
