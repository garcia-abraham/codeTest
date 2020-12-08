<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sell;
use Illuminate\Support\Facades\DB;

class SellsController extends Controller
{
    public function index()
    {
        $ventasConTotales = Sell::join("sold_products", "sold_products.id_sell", "=", "sells.id")
            ->select("sells.*", DB::raw("sum(sold_products.quantity * sold_products.price) as total"))
            ->groupBy("sells.id", "sells.created_at", "sells.updated_at", "sells.id_client")
            ->get();
        return view("ventas.ventas_index", ["ventas" => $ventasConTotales,]);
    }
}
