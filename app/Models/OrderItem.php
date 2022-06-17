<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'orders_id',
        'products_id',
        'qty',
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orders_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
