@extends('alumno.base')
@section("titulo-pagina", "Gymkanas")
@section('contenido2')
<table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Duracion</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gymkanas as $gymkana)
        <tr>
            <td>{{ $gymkana->name }}</td>
            <td>{{ $gymkana->description }}</td>
            <td>{{ $gymkana->type }}</td>
            <td>{{ $gymkana->period }}</td>
            <td>{{ $gymkana->created_at }}</td>
         
            <td>
                <form action="gymkanas/destroy/{{$gymkana->id}}" method="POST">
                    @method('POST')
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection