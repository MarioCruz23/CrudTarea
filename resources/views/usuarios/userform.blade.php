@extends('layouts.base')
<body class="bg-success">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Proyecto Crud</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Usuarios registrados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ url('/form') }}">Agregar usuario</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
        @if(session('usuarioGuardado'))
        <div class="alert alert-success">
            {{ session('usuarioGuardado') }}
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
            <div class="card bg-info">
                <form action="{{ url ('/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header text-center">Agregar nuevo usuario</div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" class="form-control col-md-9" placeholder="Ingrese nombre">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email" class="form-control col-md-9"placeholder="Ingrese email">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Rol</label>
                            <select name="rol" class="form-select" aria-label="Default select example">
                            <option selected>Seleccione rol</option>
                            <option value="Catedratico">Catedratico</option>
                            <option value="Alumno">Alumno</option>
                        </select>
                        </div>
                        <div class="row form-group">
                            <label for="img" class="col-2">Imagen</label>
                            <input type="file" name="img" id="">
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<a class="btn btn-light btn-xs mt-5" href="{{ url ('/')}}">volver</a>
</div>
</body>