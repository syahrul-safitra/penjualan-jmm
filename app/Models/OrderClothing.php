<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderClothing extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'clothing_id', 
        'jumlah', 
        'ukuran', 
        'total_harga', 
        'keterangan', 
        'desain', 
        'bukti'
    ];

    public function cloth() {
        return $this->belongsTo(Clothing::class, 'clothing_id', 'id');
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    

}
