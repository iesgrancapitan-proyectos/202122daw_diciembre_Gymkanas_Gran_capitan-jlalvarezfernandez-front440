@extends('organizador.base')
@section('titulo-pagina', 'Test')
@section('contenido3')
    <table class="table">
        <thead>
            <tr>
                <th>Gymkana</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Criterio Aceptación</th>
                <th>Puntos</th>
                <th>Respuestas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($group_test as $test)
                <tr>
                    
                    <td>{{ DB::table('gymkanas')->where('id', $tests->first()->id_gymkana)->first()->name }}</td>
                    <td>{{ DB::table('tests')->where('id', $test->id_test)->first()->name }}</td>
                    <td>{{ DB::table('tests')->where('id', $test->id_test)->first()->description }}</td>
                    <td>{{ DB::table('tests')->where('id', $test->id_test)->first()->acceptance_criteria }}</td>
                    <td>{{ DB::table('tests')->where('id', $test->id_test)->first()->score }}</td>
                    <td><button class="btn btn-success btn-sm"><a
                                href="/organizador/tests/{{ $test->id_test }}">Ver</a></button></td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
