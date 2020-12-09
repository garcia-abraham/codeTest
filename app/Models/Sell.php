<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany("App\Models\ProductSold", "id_sell");
    }
    public function client()
    {
        return $this->belongsTo("App\Models\Client", "id_client");
    }
}
