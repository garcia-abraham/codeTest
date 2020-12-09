@extends("layouts.app")
@section("titulo", "Detalle de venta ")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Detalle de venta #{{$sell->id}}</h1>
            <h1>Cliente: <small>{{$sell->client->first_name}}</small></h1>
            @include("notificacion")
            <a class="btn btn-info" href="{{route("sells.index")}}">
                <i class="fa fa-arrow-left"></i>&nbsp;Volver
            </a>
            <a class="btn btn-success" href="{{route("sells.ticket", ["id" => $sell->id])}}">
                <i class="fa fa-print"></i>&nbsp;Ticket
            </a>
            <h2>Productos</h2>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->description}}</td>
                        <td>${{number_format($product->price, 2)}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>${{number_format($product->quantity * $product->price, 2)}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total</strong></td>
                    <td>${{number_format($total, 2)}}</td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
