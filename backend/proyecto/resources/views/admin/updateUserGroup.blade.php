@extends('admin.base')
@section("titulo-pagina", "Editar Grupo")
@section('contenido')
<form method="POST" action="/admin/users-groups/update-group/{{ $id }}">
    @csrf
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

        <div class="col-md-6">

<!--             <input id="id_group" type="text" class="form-control @error('description') is-invalid @enderror" name="id_group" value="{{ DB::table('user_groups')->where('id', $id)->first()->id_group }}" required autocomplete="id_group" autofocus>
 -->
            <select name="user_group" id="user_group">
            @foreach (DB::table('groups')->get() as $group)
            <!-- <p>This is user_group {{ $group->description }}</p> -->
            <option name="id_group" value="{{$group->id}}">{{$group->description}}</option>
            @endforeach
            </select>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Editar Grupo de Usuarios') }}
            </button>
        </div>
    </div>
</form>
@endsection