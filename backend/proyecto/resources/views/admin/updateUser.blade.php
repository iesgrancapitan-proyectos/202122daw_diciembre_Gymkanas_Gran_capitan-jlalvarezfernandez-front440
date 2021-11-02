@extends('admin.base')
@section("titulo-pagina", "Actualizar Usuario")
@section('contenido')
<form method="POST" action="/admin/users/update/{{ $id }}">
    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ DB::table("users")->where('id', $id)->first()->name }}" required autocomplete="name" autofocus>

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
            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname"
                value="{{ DB::table("users")->where('id', $id)->first()->surname }}" required autocomplete="surname" autofocus>

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
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ DB::table("users")->where("id", $id)->first()->email }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="perfil" class="col-md-4 col-form-label text-md-right">{{ __('Perfil') }}</label>

        <div class="col-md-6">
            <input id="perfil" perfil="text" class="form-control @error('perfil') is-invalid @enderror" name="perfil"
                value="{{ DB::table("users")->where("id", $id)->first()->perfil }}" required autocomplete="perfil" autofocus>

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
                name="curso" value="{{ DB::table("users")->where("id", $id)->first()->curso }}" required autocomplete="curso" autofocus>

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
                {{ __('Editar Usuario') }}
            </button>
        </div>
    </div>
</form>

@endsection