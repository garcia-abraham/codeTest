@extends("layouts.app")
@section("titulo", "Agregar usuario")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Agregar usuario</h1>
            <form method="POST" action="{{route("user.store")}}">
                @csrf
                <div class="form-group">
                    <label class="label">Nombre de usuario</label>
                    <input required autocomplete="off" name="user_name" class="form-control"
                           type="text" placeholder="Nombre de Usuario">
                </div>
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
                    <label class="label">Fecha de Nacimiento</label>
                    <input required autocomplete="off" name="birthdate" class="form-control"
                           type="date" placeholder="Fecha de Nacimiento">
                </div>
                <div class="form-group">
                    <label class="label">DNI</label>
                    <input required autocomplete="off" name="dni" class="form-control"
                           type="number" placeholder="DNI">
                </div>
                <div class="form-group">
                    <label class="label">Legajo</label>
                    <input required autocomplete="off" name="file" class="form-control"
                           type="number" placeholder="Legajo">
                </div>
                

                <div class="form-group">
                    <label class="label">Contraseña</label>
                    <input required autocomplete="off" name="password" class="form-control"
                           type="password" placeholder="Contraseña">
                </div>

                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("users.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection
