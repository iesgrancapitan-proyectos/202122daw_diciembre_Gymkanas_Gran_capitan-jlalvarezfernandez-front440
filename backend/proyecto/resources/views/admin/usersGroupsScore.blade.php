@extends('admin.base')
@section('titulo-pagina', 'Grupos de Usuarios')
@section('contenido')
    <table class="table">
        <thead>
            <tr>
                <th>Gymkana</th>
                <th>Grupo</th>
                <th>Puntuación</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($gk_instance as $gymkana)
                <tr>
                    <td>{{ DB::table('gymkanas')->where('id', $gymkana->id_gymkana)->first()->name }}</td>

                    @foreach ($groups as $group)
                        <td>{{ $group->id }}</td>
                        {{-- <td>{{ DB::table('participants')->where('id_group', $group->id)->first()->id }}</td> --}}
                        {{-- @if (DB::table('participants')->where('id_group', $group->id) == $group->id)
                            <td>{{ DB::table('groups')->find($group->id)->description }}</td>
                        @endif --}}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
