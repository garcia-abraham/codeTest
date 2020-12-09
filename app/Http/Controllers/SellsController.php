<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CRUD;
use App\Models\Sell;
use Illuminate\Support\Facades\DB;

class SellsController extends Controller
{   
    use CRUD{
        destroy as genericDestroy;

    }

    public $model = Sell::class;


    public function index()
    {
        $ventasConTotales = Sell::join("sold_products", "sold_products.id_sell", "=", "sells.id")
            ->select("sells.*", DB::raw("sum(sold_products.quantity * sold_products.price) as total"))
            ->groupBy("sells.id", "sells.created_at", "sells.updated_at", "sells.id_client")
            ->get();
        return view("ventas.ventas_index", ["ventas" => $ventasConTotales,]);
    }

    public function show(Venta $venta)
    {
        $total = 0;
        foreach ($venta->productos as $producto) {
            $total += $producto->cantidad * $producto->precio;
        }
        return view("ventas.ventas_show", [
            "venta" => $venta,
            "total" => $total,
        ]);
    }

    public function destroy($id)
    {   
        $product = Sell::findOrFail($id);
        $this->genericDestroy($id);
        return redirect()->route("sells.index")->with("mensaje", "Venta eliminada");
    }
}
