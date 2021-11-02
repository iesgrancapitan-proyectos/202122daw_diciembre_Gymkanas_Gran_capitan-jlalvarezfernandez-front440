@extends('admin.base')
@section("titulo-pagina", "Actualizar Test")
@section('contenido')
<form method="POST" action="/admin/tests/update/{{ $id }}">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ DB::table("tests")->where("id", $id)->first()->name }}"required autocomplete="name" autofocus>

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
                name="description" value="{{ DB::table("tests")->where("id", $id)->first()->description }}" required autocomplete="description" autofocus>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="difficulty" class="col-md-4 col-form-label text-md-right">{{ __('Dificultad') }}</label>

        <div class="col-md-6">
            <input id="difficulty" type="number" min=1 max=3 class="form-control @error('difficulty') is-invalid @enderror" name="difficulty"
            value="{{ DB::table("tests")->where("id", $id)->first()->difficulty }}" required autocomplete="difficulty" autofocus>

            @error('difficulty')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="acceptance_criteria" class="col-md-4 col-form-label text-md-right">{{ __('Criterio de aceptación') }}</label>

        <div class="col-md-6">
            <input id="acceptance_criteria" type="text" class="form-control @error('acceptance_criteria') is-invalid @enderror"
                name="acceptance_criteria" value="{{ DB::table("tests")->where("id", $id)->first()->acceptance_criteria }}" required autocomplete="acceptance_criteria" autofocus>

            @error('acceptance_criteria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Puntuación') }}</label>

        <div class="col-md-6">
            <input id="score" type="text" class="form-control @error('score') is-invalid @enderror"
                name="score" value="{{ DB::table("tests")->where("id", $id)->first()->score }}" required autocomplete="score" autofocus>

            @error('score')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="max_period" class="col-md-4 col-form-label text-md-right">{{ __('Duracion') }}</label>

        <div class="col-md-6">
            <input id="max_period" type="text" class="form-control @error('max_period') is-invalid @enderror"
                name="max_period" value="{{ DB::table("tests")->where("id", $id)->first()->max_period }}" required autocomplete="max_period" autofocus>

            @error('max_period')
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