<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;


class ToSellController extends Controller
{
    public function index(){
        
        $total = 0;
        foreach ($this->getProducts() as $producto) {
            $total += $producto->cantidad * $producto->precio_venta;
        }
        return view("vender.vender",
            [
                "total" => $total,
                "clientes" => Client::all(),
            ]);
    }

    private function getProducts()
    {
        $productos = session("products");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }
    
    public function finishSell(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarVenta($request);
        } else {
            return $this->cancelarVenta();
        }
    }

    public function agregarProductoVenta(Request $request)
    {
        $codigo = $request->post("codigo");
        $producto = Product::where("codigo_barras", "=", $codigo)->first();
        if (!$producto) {
            return redirect()
                ->route("vender.index")
                ->with("mensaje", "Producto no encontrado");
        }
        $this->agregarProductoACarrito($producto);
        return redirect()
            ->route("vender.index");
    }
    
}
