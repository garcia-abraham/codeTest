<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientsController extends Controller
{
    public function index()
    {
        return view("clientes.clientes_index", ["clientes" => Client::all()]);
    }

    public function create()
    {
        return view("clientes.clientes_create");
    }

}
