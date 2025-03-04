<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    protected $fillable = ['transaksiID', 'kurir', 'nomor_resi', 'status_pengiriman'];
    
    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'transaksiID');
    }
}
