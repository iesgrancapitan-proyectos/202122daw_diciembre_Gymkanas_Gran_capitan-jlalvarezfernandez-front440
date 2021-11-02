@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-1">
            <p><a href="/alumno/gymkanas">Gymkanas</a></p>
            <p><a href="/alumno/inscripciones">Inscripciones</a></p>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Gymkanas') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                @yield('contenido2')
            </div>
        </div>
    </div>
</div>
@endsection
