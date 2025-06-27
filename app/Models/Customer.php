<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'no_wa', 
        'alamat', 
        'gambar'
    ];

    public function cartClothing() {
        return $this->hasMany(CartClothing::class);
    }

    public function orderCloth() {
        return $this->hasMany(OrderClothing::class);
    }

    public function orderProduct() {
        return $this->hasMany(OrderProduct::class);
    }

    public function cartProduct() {
        return $this->hasMany(CartProduct::class);
    }

}
