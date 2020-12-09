<?php

namespace App\Http\Controllers;
use App\Traits\CRUD;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    use CRUD{
        store as genericStore;
        destroy as genericDestroy;
        update as genericUpdate;

    }

    public $model = Product::class;


    public function index(){
        return view("productos.productos_index", ["products" => Product::all()]);
    }

    public function create()
    {
        return view("productos.productos_create");
    }

    public function store(Request $request)
    {   
        $producto = new Product($request->input());
        $producto->saveOrFail();
        return redirect()->route("product.index")->with("mensaje", "Producto guardado");
    }

    public function edit($id)
    {   
        $product = Product::findOrFail($id);
        return view("productos.productos_edit", ["product" => $product]);
    }

    public function destroy($id)
    {   
        $product = Product::findOrFail($id);

        $this->genericDestroy($id);
        return redirect()->route("product.index")->with("mensaje", "Producto eliminado");
    }

    public function update(Request $product,$id){

        $this->genericUpdate($product,$id);
        return redirect()->route("product.index")->with("mensaje", "Producto Modificado");

    }
}
