@extends('organizador.base')
@section("titulo-pagina", "Test")
@section('contenido3')
{{-- <p><a href="/admin/add-test"><button clas="btn btn-primary btn-sm">Nueva prueba</button></a></p> --}}
<table class="table">
    <thead>
        <tr>
            <th>Grupo</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Criterio Aceptación</th>
            <th>Respuestas</th>
            <th>Puntos</th>
            <th colspan="2">Verificar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($group_test as $g_test)
        <tr>
            <td>{{ DB::table('groups')->where('id', $g_test->id_group)->first()->description }}</td>
            <td>{{ DB::table('tests')->where('id', $g_test->id_test)->first()->name }}</td>
            <td>{{ DB::table('tests')->where('id', $g_test->id_test)->first()->description }}</td>
            <td>{{ DB::table('tests')->where('id', $g_test->id_test)->first()->acceptance_criteria }}</td>
            <td>{{ $g_test->answer }}</td>
            <td>{{ DB::table('tests')->where('id', $g_test->id_test)->first()->score }}</td>
            <td><button class="btn btn-success btn-sm"><a href="/organizador/tests/correct/{{$g_test->id}}">Correcta</a></button></td>
            <td><button class="btn btn-danger btn-sm"><a href="/organizador/tests/incorrect/{{$g_test->id}}">InCorrecta</a></button></td>
           
        </tr>
        @endforeach
    </tbody>
</table>
@endsection