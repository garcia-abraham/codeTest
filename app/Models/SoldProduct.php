<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldProduct extends Model
{
    use HasFactory;

    protected $table = "sold_products";
    protected $fillable = ["id_sell", "description", "price", "quantity"];
}

