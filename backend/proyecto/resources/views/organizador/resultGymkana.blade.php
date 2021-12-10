@extends('organizador.base')
@section('titulo-pagina', 'Grupos de Usuarios')
@section('contenido3')
    <h1>Resultados de la Gymkana {{ $gymkana->name }}</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Grupo</th>
                <th>Puntuación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $grupo)

                <tr>

                    <td>{{ $grupo->description }}</td>
                    <td>{{ DB::table('groups_test')->where('id_group', $grupo->id)->sum('score') }}</td>
                  
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
