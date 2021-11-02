@extends('admin.base')
@section("titulo-pagina", "Grupos de Usuarios")
@section('contenido')
<p style="text-align: center"><a href="/admin/add-user-group"><button type="button" class="btn btn-primary">Nuevo grupo de usuario</button></a></p>
<table class="table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Grupo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users_groups as $group)
        <tr>
            <td>{{ DB::table('users')->where('id', $group->id_user)->first()->email }}</td>
            <td>{{ DB::table('groups')->where('id', $group->id_group)->first()->description }}</td>
            <td><button class="btn btn-warning btn-sm"><a href="/admin/users-groups/edit-view/{{$group->id}}">Editar</a></button></td>
            <td>
                <form action="/admin/users-groups/destroy/{{$group->id}}" method="POST">
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