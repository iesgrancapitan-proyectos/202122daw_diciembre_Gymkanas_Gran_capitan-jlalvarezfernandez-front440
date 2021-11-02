@extends('admin.base')
@section("titulo-pagina", "Actualizar Instancia Gymkana")
@section('contenido')
<form method="POST" action="/admin/gk-instance/update/{{ $id }}">
    @csrf
    <div class="form-group row">
        <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Inicio') }}</label>

        <div class="col-md-6">
            <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                value="{{ DB::table('gymkana_instance')->where('id', $id)->first()->start_date }}" required autocomplete="start_date" autofocus>

            @error('start_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="finish_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Fin') }}</label>

        <div class="col-md-6">
            <input id="finish_date" type="text" class="form-control @error('finish_date') is-invalid @enderror"
                name="finish_date" value="{{ DB::table('gymkana_instance')->where('id', $id)->first()->finish_date }}" required autocomplete="finish_date" autofocus>

            @error('finish_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="observations" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

        <div class="col-md-6">
            <input id="observations" type="text" class="form-control @error('Observaciones') is-invalid @enderror" name="observations"
                value="{{ DB::table("gymkana_instance")->where("id", $id)->first()->observations }}" required autocomplete="observations" autofocus>

            @error('observations')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

        <div class="col-md-6">
            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                name="description" value="{{ DB::table("gymkana_instance")->where("id", $id)->first()->description }}" required autocomplete="description" autofocus>

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
                {{ __('Editar Instancia Gymkana') }}
            </button>
        </div>
    </div>
</form>

@endsection