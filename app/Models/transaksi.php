<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['userID', 'total_harga', 'status', 'metode_pembayaran', 'tanggal_transaksi'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }
}
