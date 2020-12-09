<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CRUD;
use App\Models\Client;
use App\Http\Requests\Client\RegisterClientRequest;

class ClientsController extends Controller
{   
    use CRUD{
        store as genericStore;
        destroy as genericDestroy;
        update as genericUpdate;

    }
    public $model = Client::class;


    public function index()
    {
        return view("clientes.clientes_index", ["clients" => Client::all()]);
    }

    public function create()
    {
        return view("clientes.clientes_create");
    }

    public function store(RegisterClientRequest $request){

        $request->request->add(['role_id' => 2]);
        $this->genericStore($request);

        return redirect()->route("clients.index")->with("mensaje", "Cliente Agregado");
       }

    public function destroy($id)
    {   
        $product = Client::findOrFail($id);
        $this->genericDestroy($id);
        return redirect()->route("clients.index")->with("mensaje", "Cliente Borrado");
    }

    public function edit($id)
    {   
        $client = Client::findOrFail($id);
        return view("clientes.clientes_edit", ["client" => $client]);
    }

    public function update(Request $client,$id){

        $this->genericUpdate($client,$id);
        return redirect()->route("clients.index")->with("mensaje", "Cliente Modificado");
    }

}
