@extends('layouts.base')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Modificar usuarios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url ('/')}}">Usuarios registrados</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
        @if(session('usuarioModificado'))
        <div class="alert alert-success">
            {{ session('usuarioModificado') }}
        </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <div class="card">
            <form action="{{ route('edit', $usuario->id) }}" method="POST">
            @csrf @method('PATCH')
                    <div class="card-header text-center">Modificar usuario</div>

                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre"
                        class="form-control col-md-9" value="{{ $usuario->nombre }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email"
                             class="form-control col-md-9" value="{{ $usuario->email }}">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">rol</label>
                            <input type="text" name="rol"
                             class="form-control col-md-9" value="{{ $usuario->rol }}">
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<a class="btn btn-light btn-xs mt-5" href="{{ url ('/')}}">volver</a>
</div>