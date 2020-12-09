<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CRUD;
use App\Models\Sell;
use App\Models\SoldProduct;
use Illuminate\Support\Facades\DB;
use PDF;


class SellsController extends Controller
{   
    use CRUD{
        destroy as genericDestroy;
        show    as genericShow;
    }

    public $model = Sell::class;

    public function ticket($id)
    {
        
        $sell = $this->genericShow($id);
        $products = SoldProduct::where('id_sell',$sell->id)->get();
        $total = 0;
        foreach ($products as $product) {
            $total += $product->quantity * $product->price;
        }

        // share data to view
        view()->share('products',$products);
        view()->share('total',$total);
        view()->share('sells',$sell);
        $pdf = PDF::loadView('ticket/ticket', $sell);
        return $pdf->download('ticket.pdf');

    }

    public function index()
    {
        $ventasConTotales = Sell::join("sold_products", "sold_products.id_sell", "=", "sells.id")
            ->select("sells.*", DB::raw("sum(sold_products.quantity * sold_products.price) as total"))
            ->groupBy("sells.id", "sells.created_at", "sells.updated_at", "sells.id_client")
            ->get();
        return view("ventas.ventas_index", ["ventas" => $ventasConTotales,]);
    }

    public function show($id)
    {    
        $sell = $this->genericShow($id);
        $products = SoldProduct::where('id_sell',$sell->id)->get();

        $total = 0;
        foreach ($products as $product) {
            $total += $product->quantity * $product->price;
        }
        return view("ventas.ventas_show", [
            "sell" => $sell,
            "products" =>$products,
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
