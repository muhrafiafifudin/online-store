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

    public function transactiondetails()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }

    public function payments()
    {
        return $this->hasOne(Payment::class, 'transactions_id', 'id');
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
