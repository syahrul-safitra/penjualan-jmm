<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 
        'product_id', 
        'jumlah', 
        'total_harga', 
        'keterangan', 
        'bukti'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function scopeOrderBulanIni($query) {
        return $query->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', date('m'))
                ->count();
    }

    public function scopePendapatanBulanIni($query) {
        return $query->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', date('m'));
    }
}
