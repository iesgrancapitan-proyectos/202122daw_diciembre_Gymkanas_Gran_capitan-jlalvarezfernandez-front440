@extends('admin.base')
@section("titulo-pagina", "Test")
@section('contenido')
<p style="text-align: center"><a href="/admin/add-test"><button type="button" class="btn btn-primary">Nueva prueba</button></a></p>
<table class="table">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Tiempo max</th>
            <th>Dificultad</th>
            <th>Criterio Aceptación</th>
            <th>Revisión</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tests as $test)
        <tr>
            @if($test->image !== "")
                <td><img src="/images/tests/{{$test->id_gymkana}}/{{$test->image}}" width="40px"></td>
            @else
                <td></td>
            @endif
            <td>{{ $test->name }}</td>
            <td>{{ $test->description }}</td>
            <td>{{ $test->max_period }}</td>
            <td>{{ $test->difficulty }}</td>
            <td>{{ $test->acceptance_criteria }}</td>
            <td>
                @if ($test->review == 0)
                    Sí
                @else
                    No
                @endif
            </td>
            <td><button class="btn btn-success btn-sm"><a href="/admin/tests/edit-view/{{$test->id}}">Editar</a></button></td>
           
        </tr>
        @endforeach
    </tbody>
</table>
@endsection