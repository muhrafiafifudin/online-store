<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }
}
