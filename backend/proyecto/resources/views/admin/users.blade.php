@extends('admin.base')
@section("titulo-pagina", "Usuarios")
@section('contenido')
<p style="text-align: center"><a href="add-user"><button type="button" class="btn btn-primary">Nuevo Usuario</button></a></p>
<table class="table">
    <thead>
        <tr>
            <th>Email</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Perfil</th>
            {{-- <th>Curso</th> --}}
            <th>Estado</th>
            <th>Organizador</th>
            <th>Editar</th>
            {{-- <th>Eliminar</th> --}}
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->surname }}</td>
            <td>{{ $user->perfil }}</td>
            {{-- <td>{{ $user->curso }}</td> --}}
            <td>
                @if ($user->estado == 1)
                    <button class="btn btn-info btn-sm"><a href="/admin/users/deactivate/{{$user->id}}">Desactivar</a></button></td>
                @else
                    <button class="btn btn-info btn-sm"><a href="/admin/users/activate/{{$user->id}}">Activar</a></button></td>
                @endif
            </td>
            <td>
                @if ($user->perfil != "organizador")
                    <button class="btn btn-success btn-sm"><a href="/admin/users/makeOrganizer/{{$user->id}}">Convertir</a></button>
                @endif
            </td>
            <td><button class="btn btn-warning btn-sm"><a href="/admin/users/edit-view/{{$user->id}}">Editar</a></button></td>
            {{-- Descomentar si se requiere que la app tenga la opción de eliminar usuarios --}}
            {{-- <td>
                <form action="users/destroy/{{$user->id}}" method="POST">
                    @method('POST')
                    @csrf
                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar?...')">
                </form>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
{{-- <script>
    window.addEventListener('load',function(){
        document.getElementById("texto").addEventListener("keyup", () => {
            if((document.getElementById("texto").value.length)>=1)
                fetch(`/nombres/buscador?texto=${document.getElementById("texto").value}`,{ method:'get' })
                .then(response  =>  response.text() )
                .then(html      =>  {   document.getElementById("resultados").innerHTML = html  })
            else
                document.getElementById("resultados").innerHTML = ""
        })
    });  
</script> --}}
@endsection