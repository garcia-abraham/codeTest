@extends("layouts.app")
@section("titulo", "Usuarios")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Usuarios <i class="fa fa-users"></i></h1>
            <a href="{{route("users.create")}}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre de Usuario</th>
                        <th>Legajo</th>

                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{$usuario->user_name}}</td>
                            <td>{{$usuario->file}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("users.edit",[$usuario])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("users.destroy", [$usuario])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
