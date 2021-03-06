@extends('admin.base')
@section("titulo-pagina", "Nueva Instancia Gymkana")
@section('contenido')
    <form method="POST" action="create-gk-instance">
        @csrf
        <div class="form-group row">
            <label for="id_gymkana" class="col-md-4 col-form-label text-md-right">{{ __('Gymkana') }}</label>
            <div class="col-md-6">
                <select name="id_gymkana" class="form-control">
                    @foreach($gymkanas as $gk)
                        <option value="{{$gk->id}}">{{$gk->name}}</option>
                        
                    @endforeach
                </select>
                @error('id_gymkana')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Fecha Inicio') }}</label>
            <div class="col-md-6">
                <input id="start_date" type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                    value="{{ old('start_date') }}" required autocomplete="start_date" autofocus>

                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="observations" class="col-md-4 col-form-label text-md-right">{{ __('Observaciones') }}</label>

            <div class="col-md-6">
                <input id="observations" type="text" class="form-control @error('observations') is-invalid @enderror" name="observations"
                    value="{{ old('observations') }}" required autocomplete="observations" autofocus>

                @error('observations')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripci??n') }}</label>

            <div class="col-md-6">
                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                    name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

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
                    {{ __('Agregar Gymkana') }}
                </button>
            </div>
        </div>
    </form>

@endsection
