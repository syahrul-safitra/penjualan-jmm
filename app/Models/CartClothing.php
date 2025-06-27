<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartClothing extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'clothing_id', 
        'jumlah'
    ];

    public function clothing() {
        return $this->belongsTo(Clothing::class, 'clothing_id', 'id');
    }

}
