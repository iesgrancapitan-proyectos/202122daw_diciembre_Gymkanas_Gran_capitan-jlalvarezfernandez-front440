@extends('organizador.base')
@section("titulo-pagina", "Test")
@section('contenido3')
{{-- <p><a href="/admin/add-test"><button clas="btn btn-primary btn-sm">Nueva prueba</button></a></p> --}}
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
        @foreach($tests as $test)
        <tr>
            <td>{{ DB::table('gymkanas')->where('id', $test->id_gymkana)->first()->name }}</td>
            <td>{{ $test->name }}</td>
            <td>{{ $test->description }}</td>
            <td>{{ $test->acceptance_criteria }}</td>
            <td>{{ $test->score }}</td>
            <td><button class="btn btn-success btn-sm"><a href="/organizador/tests/{{$test->id}}">Ver</a></button></td>
           
        </tr>
        @endforeach
    </tbody>
</table>
@endsection