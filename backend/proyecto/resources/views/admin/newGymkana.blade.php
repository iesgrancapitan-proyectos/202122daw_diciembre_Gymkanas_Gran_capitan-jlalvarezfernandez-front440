@extends('admin.base')
@section("titulo-pagina", "Nueva Gymkana")
@section('contenido')
    <form method="POST" action="create-gymkana" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

            <div class="col-md-6">
                <textarea id="description" class="form-control @error('description') is-invalid @enderror"
                    name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Imagen') }}</label>

            <div class="col-md-6">
                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror"
                    name="image" autofocus>

                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

            <div class="col-md-6">
                <input id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo"
                    value="{{ old('tipo') }}" required autocomplete="tipo" autofocus>

                @error('tipo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="duracion" class="col-md-4 col-form-label text-md-right">{{ __('Duracion') }}</label>
            <div class="col-md-6">
                <p>
                    <select name="hours" class="form-control @error('duracion') is-invalid @enderror">
                        @for ($i = 0; $i < 6; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <strong> horas</strong>

                    <select name="minutes" class="form-control @error('duracion') is-invalid @enderror">
                        @for ($i = 0; $i < 59; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <strong> minutos</strong>
                </p>
                @error('duracion')
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
