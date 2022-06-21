<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'users_id',
        'name',
        'email',
        'street_address',
        'house_address',
        'provinces_id',
        'cities_id',
        'districts_id',
        'villages_id',
        'post_code',
        'phone_number',
        'status',
        'order_id',
        'gross_amount',
        'transaction_id',
        'payment_type'

    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'orders_id', 'id');
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'cities_id');
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'districts_id');
    }

    public function villages()
    {
        return $this->belongsTo(Village::class, 'villages_id');
    }
}
