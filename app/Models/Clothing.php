<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothing extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'harga', 
        'gambar_depan', 
        'gambar_belakang', 
        'jumlah', 
        'deskripsi'
    ];

}
