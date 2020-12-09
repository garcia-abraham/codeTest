@extends("layouts.app")
@section("titulo", "Editar cliente")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Editar cliente</h1>
            <form method="POST" action="{{route("clients.update", [$client])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$client->first_name}}" autocomplete="off" name="first_name" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Apellido</label>
                    <input required value="{{$client->last_name}}" autocomplete="off" name="last_name" class="form-control"
                           type="text" placeholder="Apellido">
                </div>
                <div class="form-group">
                    <label class="label">DNI</label>
                    <input required value="{{$client->dni}}" autocomplete="off" name="dni"
                           class="form-control"
                           type="number" placeholder="DNI">
                </div>
                <div class="form-group">
                    <label class="label">Fecha de Nacimieto</label>
                    <input required value="{{$client->birthdate}}" autocomplete="off" name="birthdate"
                           class="form-control"
                           type="date" placeholder="Fecha de nacimiento">
                </div>
                <div class="form-group">
                    <label class="label">Numero de tarjeta</label>
                    <input required value="{{$client->credit_card}}" autocomplete="off" name="credit_card"
                           class="form-control"
                           type="number" placeholder="Numero de tarjeta">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("clients.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
