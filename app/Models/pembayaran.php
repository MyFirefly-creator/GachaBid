<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $fillable = ['transaksiID', 'bukti_pembayaran', 'status_pembayaran'];

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'transaksiID');
    }
}
