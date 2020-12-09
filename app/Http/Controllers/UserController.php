<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Support\Facades\Mail;


use App\Traits\CRUD;
use App\Models\User;

class UserController extends Controller
{

    use CRUD{
        store as genericStore;
        destroy as genericDestroy;
        update as genericUpdate;

    }

    public $model = User::class;
    
    public function show(){
        $users = User::all();
        return response()->json(
            $users, 200);
    }

    public function destroy($id)
    {   
        $user = User::findOrFail($id);
        $this->genericDestroy($id);
        return redirect()->route("users.index")->with("mensaje", "Usuario Borrado");
    }


    public function checkUser()
    {
        return response()->json(request()->user());
    }

    public function register(RegisterUserRequest $request)
    {   
        $request->request->add(['role_id' => 1]);
        return $registered = $this->genericStore($request);       
    }

    public function index()
    {
        return view("usuarios.usuarios_index", ["usuarios" => User::all()]);

    }

    public function create()
    {
        return view("usuarios.usuarios_create");
    }
    

    public function edit($id)
    {   
        $user = User::findOrFail($id);
        return view("usuarios.usuarios_edit", ["user" => $user,
        ]);
    }

    public function update(Request $user,$id){

        $this->genericUpdate($user,$id);
        return redirect()->route("users.index")->with("mensaje", "Usuario Modificado");

    }

    public function store(Request $request){

        $request->request->add(['role_id' => 2]);
        $this->genericStore($request);
        return redirect()->route("users.index")->with("mensaje", "Usuario Creado");


    }



}