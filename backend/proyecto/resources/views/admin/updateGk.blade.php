@extends('admin.base')
@section("titulo-pagina", "Actualizar Gymkana")
@section('contenido')
<form method="POST" action="/admin/gymkanas/update/{{ $id }}">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ DB::table('gymkanas')->where('id', $id)->first()->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

        <div class="col-md-6">
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                name="description" value="{{ DB::table("gymkanas")->where("id", $id)->first()->description }}" required autocomplete="description" autofocus>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

        <div class="col-md-6">
            <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type"
                value="{{ DB::table("gymkanas")->where("id", $id)->first()->type }}" required autocomplete="type" autofocus>

            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="period" class="col-md-4 col-form-label text-md-right">{{ __('Duracion') }}</label>

        <div class="col-md-6">
            <input id="period" type="text" class="form-control @error('period') is-invalid @enderror"
                name="period" value="{{ DB::table("gymkanas")->where("id", $id)->first()->period }}" required autocomplete="period" autofocus>

            @error('period')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Editar Gymkana') }}
            </button>
        </div>
    </div>
</form>

@endsection