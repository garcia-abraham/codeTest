@extends("layouts.app")
@section("titulo", "Agregar cliente")
@section("contenido")
<div class="row">
    <div class="col-12">
        <h1>Agregar cliente</h1>
        <form method="POST" action="{{route("clients.store")}}">
            @csrf
            <div class="form-group">
                <label class="label">Nombre</label>
                <input required autocomplete="off" name="first_name"
                    class="form-control @error('first_name') is-invalid @enderror" type="text" placeholder="Nombre">
            </div>
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">Apellido</label>
                <input required autocomplete="off" name="last_name" class="form-control @error('last_name') is-invalid @enderror" type="text"
                    placeholder="Apellido">
            </div>
            @error('last_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">DNI</label>
                <input required autocomplete="off" name="dni" class="form-control @error('dni') is-invalid @enderror" type="number" placeholder="DNI">
            </div>
            @error('dni')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">Fecha de Nacimiento</label>
                <input required autocomplete="off" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" type="date"
                    placeholder="Fecha de nacimiento">
            </div>
            @error('birthdate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="form-group">
                <label class="label">Numero de tarjeta</label>
                <input required autocomplete="off" name="credit_card" class="form-control @error('credit_card') is-invalid @enderror" type="text"
                    placeholder="Tarjeta de Credito">
            </div>
            @error('credit_card')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            @include("notificacion")
            <button class="btn btn-success">Guardar</button>
            <a class="btn btn-primary" href="{{route("clients.index")}}">Volver al listado</a>
        </form>
    </div>
</div>
@endsection