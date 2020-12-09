@extends("layouts.app")
@section("titulo", "Agregar producto")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Agregar producto</h1>
            <form method="POST" action="{{route("product.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required autocomplete="off" name="name" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Proovedor</label>
                    <input required autocomplete="off" name="provider" class="form-control"
                           type="text" placeholder="Proovedor">
                </div>
                <div class="form-group">
                    <label class="label">Marca</label>
                    <input required autocomplete="off" name="brand" class="form-control"
                           type="text" placeholder="Marca">
                </div>
                <div class="form-group">
                    <label class="label">Precio</label>
                    <input required autocomplete="off" name="price" class="form-control"
                           type="decimal(9,2)" placeholder="Precio">
                </div>
                <div class="form-group">
                    <label class="label">Fecha de Vencimiento</label>
                    <input required autocomplete="off" name="expiration_date" class="form-control"
                           type="date" placeholder="Fecha de Vencimiento">
                </div>
                <div class="form-group">
                    <label class="label">Cantidad</label>
                    <input required autocomplete="off" name="quantity" class="form-control"
                           type="Number" placeholder="Cantidad">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("product.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection
