@extends('admin.base')
@section("titulo-pagina", "Nuevo Participante")
@section('contenido')
    <form method="POST" action="create-participant">
        @csrf
        <div class="form-group row">
            <label for="id_group" class="col-md-4 col-form-label text-md-right">{{ __('Grupo') }}</label>

            <div class="col-md-6">
                <select name="id_group" class="form-control">
                    @foreach($groups as $group)
                        <option value="{{$group->id}}">{{$group->description}}</option>
                    @endforeach
                </select>

                @error('id_group')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="id_gymkana_instance" class="col-md-4 col-form-label text-md-right">{{ __('Instancia Gymkanas') }}</label>

            <div class="col-md-6">
                <select name="id_gymkana_instance" class="form-control">
                    @foreach($gkInstance as $gk)
                        <option value="{{$gk->id}}">{{$gk->description}}</option>
                    @endforeach
                </select>

                @error('id_gymkana_instance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Agregar Participante') }}
                </button>
            </div>
        </div>
    </form>
@endsection
