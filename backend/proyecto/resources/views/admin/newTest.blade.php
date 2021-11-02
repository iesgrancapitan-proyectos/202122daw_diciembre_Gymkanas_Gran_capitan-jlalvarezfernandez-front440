@extends('admin.base')
@section("titulo-pagina", "Nuevo Test")
@section('contenido')
    <form method="POST" action="create-test" enctype="multipart/form-data">
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
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Título') }}</label>

            <div class="col-md-6">
                <textarea id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus></textarea>
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
                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                    name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                @error('description')
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
            <label for="difficulty" class="col-md-4 col-form-label text-md-right">{{ __('Dificultad') }}</label>

            <div class="col-md-6">
                <input id="difficulty" type="number" min="1" max="3" class="form-control @error('difficulty') is-invalid @enderror"
                    name="difficulty" value="{{ old('difficulty') }}" required autocomplete="difficulty" autofocus>

                @error('difficulty')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="acceptance_criteria" class="col-md-4 col-form-label text-md-right">{{ __('Criterio de Aceptación') }}</label>

            <div class="col-md-6">
                <textarea id="acceptance_criteria" class="form-control @error('acceptance_criteria') is-invalid @enderror"
                    name="acceptance_criteria" required autocomplete="acceptance_criteria" autofocus> </textarea>
                @error('acceptance_criteria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="review" class="col-md-4 col-form-label text-md-right">{{ __('Revisión organizador') }}</label>
            <div class="col-md-6">
                <input type="radio" id="review" name="review" value=0>
                <label for="no">No</label><br>
                <input type="radio" id="review" name="review" value=1>
                <label for="si">Si</label><br>
                @error('review')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="score" class="col-md-4 col-form-label text-md-right">{{ __('Puntos') }}</label>

            <div class="col-md-6">
                <input id="score" type="number" class="form-control @error('score') is-invalid @enderror"
                    name="score" value="{{ old('score') }}">

                @error('score')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Agregar Test') }}
                </button>
            </div>
        </div>
    </form>

@endsection
