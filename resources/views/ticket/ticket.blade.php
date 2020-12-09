<!doctype html>

    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ticket</title>
    </head>
    <body>

    <style>
    /*css*/
    </style>
    <br>
    <h1 style="text-align:center">Mini Tienda</h1>
    <h2 style="text-align:center">Detalle de Compra</h2>
    <h2>ID de venta: {{$sells->id}}</h2>
    <h3>Nombre Cliente: {{$sells->client->first_name}} {{$sells->client->last_name}}</h3>
    <table class="table table-bordered">
                    <thead>
                    </thead>
                    <tbody>
                    <tr>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Subtotal</th>

                    </tr>
                    @foreach($products as $product)
                        <tr>
                        <td>{{$product->quantity}}</td>
                        <td>${{number_format($product->price, 2)}}</td>
                        <td>{{$product->description}}</td>
                        <td>${{number_format($product->quantity * $product->price, 2)}}</td>
                        </tr>
                    @endforeach
                    <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total</strong></td>
                    <td>${{number_format($total, 2)}}</td>
                </tr>
                </tfoot>
            
     </body>