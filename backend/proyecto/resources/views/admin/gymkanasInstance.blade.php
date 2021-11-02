@extends('admin.base')
@section("titulo-pagina", "Instancia Gymkanas")
@section('contenido')
<p style="text-align: center"><a href="add-gk-instance"><button type="button" class="btn btn-primary">Nueva Instancia Gymkana</button></a></p>
<table class="table">
    <thead>
        <tr>
            <th>Gymkana</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Observaciones</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Editar</th>
            <th>Eliminar</th>
    </thead>
    <tbody>
        @foreach($gk_instance as $gymkana)
        <tr>
            <td>{{ DB::table('gymkanas')->where('id', $gymkana->id_gymkana)->first()->name }}</td>
            <td>{{ $gymkana->start_date }}</td>
            <td>{{ $gymkana->finish_date }}</td>
            <td>{{ $gymkana->observations }}</td>
            <td>{{ $gymkana->description }}</td>
            <td>
                @if ($gymkana->finish_date >  date('Y-m-d H:i:s'))
                    Activa
                @else
                    Finalizada
                @endif
            </td>
            <td><button class="btn btn-warning btn-sm"><a href="/admin/gk-instance/edit-view/{{$gymkana->id}}">Editar</a></button></td>
            <td>
                <form action="gk-instance/destroy/{{$gymkana->id}}" method="POST">
                    @method('POST')
                    @csrf
                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar?...')">
                </form>
            </td>
        </tr>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection