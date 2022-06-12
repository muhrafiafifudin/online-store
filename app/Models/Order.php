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
        'full_name',
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
        'tracking_no'
    ];
}
