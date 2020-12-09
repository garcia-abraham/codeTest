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
                <input required autocomplete="off" name="name" class="form-control @error('name') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror" type="text" placeholder="Nombre">
            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">Proovedor</label>
                <input required autocomplete="off" name="provider" class="form-control @error('provider') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror" type="text"
                    placeholder="Proovedor">
            </div>
            @error('provider')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">Marca</label>
                <input required autocomplete="off" name="brand" class="form-control @error('brand') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror" type="text" placeholder="Marca">
            </div>
            @error('brand')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">Precio</label>
                <input required autocomplete="off" name="price" class="form-control @error('price') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror" type="decimal(9,2)"
                    placeholder="Precio">
            </div>
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">Fecha de Vencimiento</label>
                <input required autocomplete="off" name="expiration_date" class="form-control @error('expiration_date') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror" type="date"
                    placeholder="Fecha de Vencimiento">
            </div>
            @error('expiration_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">Cantidad</label>
                <input required autocomplete="off" name="quantity" class="form-control @error('quantity') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror @error('birthdate') is-invalid @enderror" type="Number"
                    placeholder="Cantidad">
            </div>
            @error('quantity')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            @include("notificacion")
            <button class="btn btn-success">Guardar</button>
            <a class="btn btn-primary" href="{{route("product.index")}}">Volver al listado</a>
        </form>
    </div>
</div>
@endsection