@extends('admin.base')
@section('titulo-pagina', 'Grupos de Usuarios')
@section('contenido')
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
            @php
                $grupos_total = [];
                foreach ($groups as $index => $grupo) {
                    $grupo_array  = (array)$grupo;
                    $grupo_array['score'] =  DB::table('groups_test')->where('id_group', $grupo->id)->sum('score');
                    $grupos_total[] = $grupo_array;
                }
                $score = array_column($grupos_total, 'score');
                
                array_multisort($score, SORT_DESC, $grupos_total);
            @endphp
            @foreach ($grupos_total as $grupo)
                <tr>
                    <td>{{ $grupo['description'] }}</td>
                    <td>{{ $grupo['score'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
