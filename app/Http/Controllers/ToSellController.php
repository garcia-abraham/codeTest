<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Sell;
use App\Models\SoldProduct;


class ToSellController extends Controller
{
    public function index(){
        
        $total = 0;
        foreach ($this->getProducts() as $producto) {
            $total += $producto->quantity * $producto->price;
        }
        return view("vender.vender",
            [
                "total" => $total,
                "clients" => Client::all(),
            ]);
    }

    public function endSell(Request $request)
    {
        $venta = new Sell();
        $venta->id_client = $request->input("id_client");
        $venta->saveOrFail();
        $idVenta = $venta->id;
        $productos = $this->getProducts();
        // Recorrer carrito de compras
        foreach ($productos as $producto) {
            // El producto que se vende...
            $productoVendido = new SoldProduct();
            $productoVendido->fill([
                "id_sell" => $idVenta,
                "description" => $producto->name,
                "price" => $producto->price,
                "quantity" => $producto->quantity,
            ]);
            // Lo guardamos
            $productoVendido->saveOrFail();
            // Y restamos la existencia del original
            $productoActualizado = Product::find($producto->id);
            $productoActualizado->quantity -= $productoVendido->quantity;
            $productoActualizado->saveOrFail();
        }
        $this->emptyProducts();
        return redirect()
            ->route("toSell.index")
            ->with("mensaje", "Venta terminada");
    }

    private function emptyProducts()
    {
        $this->saveProducts(null);
    }

    private function getProducts()
    {
        $productos = session("productos");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }
    
    public function finishSell(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->endSell($request);
        } else {
            return $this->cancelSell();
        }
    }

    public function cancelSell()
    {
        $this->emptyProducts();
        return redirect()
            ->route("toSell.index")
            ->with("mensaje", "Venta cancelada");
    }

    public function addProductToSell(Request $request)
    {
        $codigo = $request->post("codigo");
        $producto = Product::where("id", "=", $codigo)->first();
        if (!$producto) {
            return redirect()
                ->route("toSell.index")
                ->with("mensaje", "Producto no encontrado");
        }
        $this->addProductCart($producto);
        return redirect()
            ->route("toSell.index");
    }

    private function addProductCart($producto)
    {   
        if ($producto->quantity <= 0) {
            return redirect()->route("toSell.index")
                ->with([
                    "mensaje" => "No hay existencias del producto",
                    "tipo" => "danger"
                ]);
        }
        $productos = $this->getProducts();
        $posibleIndice = $this->searchProductIndex($producto->id, $productos);
        if ($posibleIndice === -1) {
            $producto->quantity = 1;
            array_push($productos, $producto);
        } else {
            if ($productos[$posibleIndice]->quantity + 1 > $producto->quantity) {
                return redirect()->route("toSell.index")
                    ->with([
                        "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                        "tipo" => "danger"
                    ]);
            }
            $productos[$posibleIndice]->quantity++;
        }
        $this->saveProducts($productos);
    }

    private function searchProductIndex(string $codigo, array &$productos)
    {
        foreach ($productos as $indice => $producto) {
            if ($producto->id === $codigo) {
                return $indice;
            }
        }
        return -1;
    }
    private function saveProducts($productos)
    {
        session(["productos" => $productos,
        ]);
    }

    public function quitProduct(Request $request)
    {
        $indice = $request->post("indice");
        $productos = $this->getProducts();
        array_splice($productos, $indice, 1);
        $this->saveProducts($productos);
        return redirect()
            ->route("toSell.index");
    }

    
}
