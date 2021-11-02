@extends('admin.base')
@section("titulo-pagina", "Test")
@section('contenido')
{{-- <p><a href="add-gymkana"><button clas="btn btn-primary btn-sm">Nueva Gymkana</button></a></p> --}}
<table class="table">
    <thead>
        <tr>
            <th>Titulo Gymkana</th>
            <th>Descripción Gymkana</th>
            <th>Num Pruebas</th>
            <th>Pruebas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gymkanas as $gymkana)
        <tr>
            <td>{{ $gymkana->name }}</td>
            <td>{{ $gymkana->description }}</td>
            <td>{{ sizeof(DB::table('tests')->where('id_gymkana', $gymkana->id)->get())}}</td>
            <td><button class="btn btn-success btn-sm"><a href="/admin/tests/{{$gymkana->id}}">Ver Pruebas</a></button></td>           
        </tr>
        @endforeach
    </tbody>
</table>
@endsection