@extends("layouts.app")
@section("titulo", "Clientes")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Clientes <i class="fa fa-users"></i></h1>
            <a href="{{route("clients.create")}}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>DNI</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Numero de Tarjeta</th>

                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{$client->first_name}}</td>
                            <td>{{$client->last_name}}</td>
                            <td>{{$client->dni}}</td>
                            <td>{{$client->birthdate}}</td>
                            <td>{{$client->credit_card}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("clients.edit",[$client])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("clients.destroy", [$client])}}" method="post">
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
