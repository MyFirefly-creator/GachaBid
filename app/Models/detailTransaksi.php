<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
    use HasFactory;
    protected $fillable = ['transaksiID', 'produkID', 'jumlah', 'harga_satuan', 'subtotal'];
}
