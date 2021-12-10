@extends('admin.base')
@section("titulo-pagina", "Gymkanas")
@section('contenido')
<p style="text-align: center"><a href="add-gymkana"><button type="button" class="btn btn-primary">Nueva Gymkana</button></a></p>
<table class="table">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Duracion</th>
            <th>Fecha Creación</th>
            <th>Empezar</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gymkanas as $gymkana)
        <tr>
            @if($gymkana->image !== "")
                <td><img src="/images/gymkanas/{{$gymkana->image}}" width="40px"></td>
            @else
                <td></td>
            @endif
            <td>{{ $gymkana->name }}</td>
            <td>{{ $gymkana->description }}</td>
            <td>{{ $gymkana->type }}</td>
            <td>{{ $gymkana->period }}</td>
            <td>{{ $gymkana->created_at }}</td>
            <td><button class="btn btn-success btn-sm"><a href="/admin/gymkanas/start/{{$gymkana->id}}">Empezar</a></button></td>
            <td><button class="btn btn-warning btn-sm"><a href="/admin/gymkanas/edit-view/{{$gymkana->id}}">Editar</a></button></td>
            <td>
                <form action="gymkanas/destroy/{{$gymkana->id}}" method="POST">
                    @method('POST')
                    @csrf
                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar?...')">
                </form>
            </td>
           
        </tr>
        @endforeach
    </tbody>
</table>
@endsection