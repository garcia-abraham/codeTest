@extends("layouts.app")
@section("titulo", "Editar producto")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Editar producto</h1>
            <form method="POST" action="{{route("product.update", [$product])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$product->name}}" autocomplete="off" name="name"
                           class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Proovedor</label>
                    <input required value="{{$product->provider}}" autocomplete="off" name="provider"
                           class="form-control"
                           type="text" placeholder="Proovedor">
                </div>
                <div class="form-group">
                    <label class="label">Marca</label>
                    <input required value="{{$product->brand}}" autocomplete="off" name="brand"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Marca">
                </div>
                <div class="form-group">
                    <label class="label">Fecha de Vencimiento</label>
                    <input required value="{{$product->expiration_date}}" autocomplete="off" name="expiration_date"
                           class="form-control"
                           type="date" placeholder="Fecha de Vencimiento">
                </div>
                <div class="form-group">
                    <label class="label">Precio</label>
                    <input required value="{{$product->price}}" autocomplete="off" name="price"
                           class="form-control"
                           type="decimal(9,2)" placeholder="Precio">
                </div>
                <div class="form-group">
                    <label class="label">Cantidad</label>
                    <input required value="{{$product->quantity}}" autocomplete="off" name="quantity"
                           class="form-control"
                           type="number" placeholder="Cantidad">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("product.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
