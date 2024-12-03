<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    

    protected $fillable = [
        'name',
        'sale_price',
        'quantity',
        'image',
        'purchase_price',
    ];
    public function cartItems()
{
    return $this->hasMany(CartItem::class);
}
}
