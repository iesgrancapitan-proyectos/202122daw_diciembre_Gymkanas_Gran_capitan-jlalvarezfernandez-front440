@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-1">
            <p><a href="/admin/gymkanas">Gymkanas</a></p>
            <p><a href="/admin/tests">Pruebas</a></p>
            <p><a href="/admin/gk-instance">Instancias Gymkanas</a></p>
            <p><a href="/admin/users">Usuarios</a></p>
            <p><a href="/admin/groups">Grupos</a></p>
            <p><a href="/admin/users-groups">Usuarios grupos</a></p>
            <p><a href="/admin/participants">Participantes</a></p>
            <p><a href="/admin/inscriptions">Inscripciones</a></p>
            
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
                @yield('contenido')
            </div>
        </div>
    </div>
</div>
@endsection
