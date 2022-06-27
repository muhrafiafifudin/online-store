<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    protected $fillable = [
        'name',
        'avatar',
        'google_id',
        'email',
        'email_verified_at',
        'password',
        'street_address',
        'house_address',
        'provinces_id',
        'cities_id',
        'districts_id',
        'villages_id',
        'post_code',
        'phone_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function provinces()
    {
        return $this->belongsTo(Provinces::class, 'provinces_id');
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
