@extends('admin.base')
@section("titulo-pagina", "Inscripciones")
@section('contenido')
<table class="table">
    <thead>
        <tr>
            <th>Gymkana</th>
            <th>Grupo Participante</th>
            <th>Date</th>
           {{--  <th>Observations</th> --}}
           {{--  <th>Botones</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($inscriptions as $inscription)
        <tr>
            <td>{{ DB::table('gymkana_instance')->where('id', $inscription->id_gymkana_instance)->first()->description }}</td>
            <td>{{ DB::table('groups')->where('id', DB::table('participants')->where('id', $inscription->id_participant)->first()->id_group)->first()->description }}</td>
            <td>{{ $inscription->date }}</td>
           {{--  <td>{{ $inscription->observations }}</td> --}}
           {{--  @if($inscription->checkup !== 1)
                <td><button class="btn btn-success btn-sm"><a href="/admin/inscriptions/accept/{{$inscription->id}}">Aceptar</a></button></td>
                <td><button class="btn btn-warning btn-sm"><a href="/admin/inscriptions/deny/{{$inscription->id}}">Rechazar</a></button></td>
            @endif --}}
        </tr>
        @endforeach
    </tbody>
</table>
@endsection