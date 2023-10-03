@extends('layouts.base')
@extends('layouts.app')
@section('content')
<body class="bg-success">
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
@endsection
