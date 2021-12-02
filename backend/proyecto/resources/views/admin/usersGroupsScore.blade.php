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

                   
                        <td>{{DB::table('groups')->where('id',(DB::table('participants')->where('id_gymkana_instance', $gymkana->id)->first()->id_group))->first()->description}}</td>
                        <td>{{DB::table('groups_test')->where('id_group',(DB::table('groups')->where('id',(DB::table('participants')->where('id_gymkana_instance', $gymkana->id)->first()->id_group))->first()->id))->sum('score')}}</td>
                        
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
