@extends('admin.base')
@section("titulo-pagina", "Participantes")
@section('contenido')
<p style="text-align: center"><a href="add-participant"><button type="button" class="btn btn-primary">Nuevo Participante</button></a></p>
<table class="table">
    <thead>
        <tr>
            <th>Group</th>
            <th>Gymkana</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($participants as $p)
        <tr>
            <td>{{ DB::table('groups')->where('id', $p->id_group)->first()->description }}</td>
            <td>{{ DB::table('gymkana_instance')->where('id', $p->id_gymkana_instance)->first()->description }}</td>
            <td>
                <form action="/admin/participants/destroy/{{$p->id}}" method="POST">
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