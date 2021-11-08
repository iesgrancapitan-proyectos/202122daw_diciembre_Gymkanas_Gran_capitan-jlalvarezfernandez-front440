@extends('admin.base')
@section("titulo-pagina", "Editar Grupo")
@section('contenido')
<form method="POST" action="/admin/groups/update-group/{{ $id }}">
    @csrf
    <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

        <div class="col-md-6">
            {{--<input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ DB::table('groups')->where('id', $id)->first()->description }}" required autocomplete="description" autofocus> --}}

            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                    value="{{ DB::table('groups')->where('id', $id)->first()->description }}" required autocomplete="description" autofocus>
            
            {{-- $id --}}                    
            {{-- DB::table('user_groups')->where('id', $id)->first()->description --}}

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
                {{ __('Editar Grupo') }}
            </button>
        </div>
    </div>
</form>
@endsection