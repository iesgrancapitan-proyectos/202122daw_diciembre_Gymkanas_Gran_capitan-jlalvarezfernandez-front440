@extends('admin.base')
@section("titulo-pagina", "Nuevo Grupo de usuario")
@section('contenido')
    <form method="POST" action="create-user-group">
        @csrf
        <div class="form-group row">
            <label for="id_user" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

            <div class="col-md-6">
                <select name="id_user" class="form-control">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                    @endforeach
                </select>

                @error('id_user')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
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
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Agregar Grupo') }}
                </button>
            </div>
        </div>
    </form>
@endsection
