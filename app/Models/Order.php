<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'country', 'first_name', 'last_name', 'address', 'city', 'district', 
        'email', 'phone', 'order_notes', 'total_amount', 'status','status'
    ];
    public function orderItems()
    {
        return $this->hasMany(Order_items::class);
    }
}
