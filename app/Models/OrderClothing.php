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
        'bukti',
        'status_dp',
        'nominal_dp'
    ];

    public function cloth() {
        return $this->belongsTo(Clothing::class, 'clothing_id', 'id');
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
