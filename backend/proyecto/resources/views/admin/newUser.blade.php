@extends('admin.base')
@section("titulo-pagina", "Nueva Usuario")
@section('contenido')
    <form method="POST" action="create-user">
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
            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

            <div class="col-md-6">
                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                    name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

            <div class="col-md-6">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="passwd" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

            <div class="col-md-6">
                <input id="passwd" type="text" class="form-control @error('passwd') is-invalid @enderror"
                    name="passwd" value="{{ old('passwd') }}" required autocomplete="passwd" autofocus>

                @error('passwd')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="perfil" class="col-md-4 col-form-label text-md-right">{{ __('Perfil') }}</label>

            <div class="col-md-6">
                <input id="perfil" type="text" class="form-control @error('perfil') is-invalid @enderror"
                    name="perfil" value="{{ old('perfil') }}" required autocomplete="perfil" autofocus>

                @error('perfil')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="curso" class="col-md-4 col-form-label text-md-right">{{ __('Curso') }}</label>

            <div class="col-md-6">
                <input id="curso" type="text" class="form-control @error('curso') is-invalid @enderror"
                    name="curso" value="{{ old('curso') }}">

                @error('curso')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Agregar Usuario') }}
                </button>
            </div>
        </div>
    </form>

@endsection
