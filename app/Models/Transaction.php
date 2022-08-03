<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'users_id',
        'name',
        'email',
        'provinces_id',
        'cities_id',
        'address',
        'post_code',
        'phone_number',
        'status',
        'order_id',
        'shipping',
        'subtotal',
        'total',
        'transaction_id',
        'payment_type'

    ];

    public function transactiondetails()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function payments()
    {
        return $this->hasOne(Payment::class, 'transactions_id', 'id');
    }
}
