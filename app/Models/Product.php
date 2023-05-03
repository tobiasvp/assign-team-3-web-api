<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        // 'nama_barang',
        // 'deskripsi',
        // 'jenis_barang',


        'nama_barang',
        'deskripsi',
        'jenis_barang',
        'stock_barang',
        'harga_beli',
        'harga_jual',
        'image'
    ];
}
