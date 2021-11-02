    @extends('admin.base')
    @section("titulo-pagina", "Grupos")
    @section('contenido')
    <p style="text-align: center"><a href="add-group"><button type="button" class="btn btn-primary">Nuevo Grupo</button></a></p>
    <table class="table">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $g)
            <tr>
                <td>{{ $g->description }}</td>
                <td><button class="btn btn-warning btn-sm"><a href="/admin/groups/edit-view/{{$g->id}}">Editar</a></button></td>
                <td>
                    <form action="groups/destroy/{{$g->id}}" method="POST">
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