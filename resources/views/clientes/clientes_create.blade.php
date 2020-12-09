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
                    <input required autocomplete="off" name="first_name" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Apellido</label>
                    <input required autocomplete="off" name="last_name" class="form-control"
                           type="text" placeholder="Apellido">
                </div>
                <div class="form-group">
                    <label class="label">DNI</label>
                    <input required autocomplete="off" name="dni" class="form-control"
                           type="number" placeholder="DNI">
                </div>
                <div class="form-group">
                    <label class="label">Fecha de Nacimiento</label>
                    <input required autocomplete="off" name="birthdate" class="form-control"
                           type="date" placeholder="Fecha de nacimiento">
                </div>
                <div class="form-group">
                    <label class="label">Numero de tarjeta</label>
                    <input required autocomplete="off" name="credit_card" class="form-control"
                           type="text" placeholder="Tarjeta de Credito">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("clients.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection
