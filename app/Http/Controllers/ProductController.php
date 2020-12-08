<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        return view("productos.productos_index", ["productos" => Product::all()]);
    }

    public function create()
    {
        return view("productos.productos_create");
    }

    public function store(Request $request)
    {
        $producto = new Product($request->input());
        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("mensaje", "Producto guardado");
    }
}
