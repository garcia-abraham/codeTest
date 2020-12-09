@extends("layouts.app")
@section("titulo", "Productos")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Productos <i class="fa fa-box"></i></h1>
            <a href="{{route("product.create")}}" class="btn btn-success mb-2">Agregar</a>
            @include("notificacion")
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        
                        <th>Código Producto</th>
                        <th>Nombre</th>
                        <th>Marca</th>
                        <th>Fecha de Vencimiento</th>
                        <th>Precio</th>
                        <th>Proovedor</th>
                        <th>Cantidad</th>

                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->brand}}</td>
                            <td>{{$product->expiration_date}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->provider}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route("product.edit",[$product])}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route("product.destroy", [$product])}}" method="post">
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
