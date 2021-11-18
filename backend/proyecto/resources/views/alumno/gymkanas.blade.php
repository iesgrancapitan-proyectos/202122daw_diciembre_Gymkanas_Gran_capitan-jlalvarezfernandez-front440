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
           <!--  <th>Empezar</th> -->
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
           <!--  <td><button class="btn btn-success btn-sm"><a href="/admin/gymkanas/start/{{$gymkana->id}}">Empezar</a></button></td>
            <td><button class="btn btn-warning btn-sm"><a href="/admin/gymkanas/edit-view/{{$gymkana->id}}">Editar</a></button></td> -->
            <td>
                <form action="gymkanas/destroy/{{$gymkana->id}}" method="POST">
                    @method('POST')
                    @csrf
                    <!-- <input type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar?...')"> -->
                </form>
            </td>
            {{-- <td><button class="btn btn-danger btn-sm"><a href="/admin/gymkanas/destroy/{{$gymkana->id}}">Borrar</a></td></button> --}}
            {{-- <td><button class="btn btn-warning btn-sm"><a href="{{ view('editViewGk',['gymkana' => $gymkana]) }}">Editar</td></button> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection