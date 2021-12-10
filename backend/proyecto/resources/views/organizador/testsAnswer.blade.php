@extends('organizador.base')
@section('titulo-pagina', 'Test')
@section('contenido3')
    <table class="table">
        <thead>
            <tr>
                <th>Grupo</th>
                <th>Hora de envio</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Criterio Aceptación</th>
                <th>Respuestas</th>
                <th>Puntos</th>
                <th colspan="2">Verificar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($group_test as $g_test)
                <tr>
                    <td>{{ DB::table('groups')->where('id', $g_test->id_group)->first()->description }}</td>
                    <td>{{ DB::table('groups_test')->where('id', $g_test->id)->first()->start_date }}</td>
                    <td>{{ DB::table('tests')->where('id', $g_test->id_test)->first()->name }}</td>
                    <td>{{ DB::table('tests')->where('id', $g_test->id_test)->first()->description }}</td>
                    <td>{{ DB::table('tests')->where('id', $g_test->id_test)->first()->acceptance_criteria }}</td>
                    <td>{{ $g_test->answer }}</td>
                    <td>{{ DB::table('tests')->where('id', $g_test->id_test)->first()->score }}</td>
                    <td><button class="btn btn-success btn-sm"><a
                                href="/organizador/tests/correct/{{ $g_test->id_test }}/{{$g_test->id_group}}">Aceptada</a></button></td>
                    <td><button class="btn btn-danger btn-sm"><a
                                href="/organizador/tests/incorrect/{{ $g_test->id_test }}/{{$g_test->id_group}}">Rechazada</a></button></td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
