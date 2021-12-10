@extends('admin.base')
@section("titulo-pagina", "Inscripciones")
@section('contenido')
<table class="table">
    <thead>
        <tr>
            <th>Gymkana</th>
            <th>Grupo Participante</th>
            <th>Date</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($inscriptions as $inscription)
        <tr>
            <td>{{ DB::table('gymkana_instance')->where('id', $inscription->id_gymkana_instance)->first()->description }}</td>
            <td>{{ DB::table('groups')->where('id', DB::table('participants')->where('id', $inscription->id_participant)->first()->id_group)->first()->description }}</td>
            <td>{{ $inscription->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection