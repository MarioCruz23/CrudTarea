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
        <div class="col-md-10">
            @if(session('usuarioEliminado'))
            <div class="alert alert-success">
            {{ session('usuarioEliminado')}}
            </div>
            @endif
            <table class="table table-success table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->rol }}</td>
                        <td>
                            <img src="{{ asset('storage').'/'.$user->img}}" alt="{{$user->img}}" class="img-fluid" width="100px">
                            <img alt="{{$user->img}}" class="img-fluid" width="100px">
                        </td>
                        <td>
                            <a href="{{ route ('editform', $user->id) }}" class="btn btn-primary mb-1 ">
                            <i class="fas fa-pencil-alt "></i>
                            </a>
                            <form action="{{ route('delete', $user->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿borrar?');" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>   
                        </td>
                    </tr>
                        @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
</body>