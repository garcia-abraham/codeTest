@extends("layouts.app")
@section("titulo", "Editar usuario")
@section("contenido")
    <div class="row">
        <div class="col-12">
            <h1>Editar usuario</h1>
            <form method="POST" action="{{route("user.update", [$user])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Nombre de Usuario</label>
                    <input required value="{{$user->user_name}}" autocomplete="off" name="user_name" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Nombre</label>
                    <input required value="{{$user->first_name}}" autocomplete="off" name="first_name" class="form-control"
                           type="text" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label class="label">Apellido</label>
                    <input required value="{{$user->last_name}}" autocomplete="off" name="last_name" class="form-control"
                           type="text" placeholder="Apellido">
                </div>
                @include("notificacion")
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("users.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection
