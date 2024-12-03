<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Đảm bảo các trường có thể được gán giá trị một cách an toàn
    protected $fillable = [
        'user_id', 
    ];

    // Mối quan hệ một giỏ hàng có nhiều sản phẩm trong giỏ hàng (CartItem)
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // Mối quan hệ giỏ hàng với người dùng (User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
