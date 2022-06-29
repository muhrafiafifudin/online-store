<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $table = 'stores';

    protected $guarded = [];

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
