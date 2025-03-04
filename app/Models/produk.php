<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = ['nama_produk', 'deskripsi', 'harga', 'stok', 'kategoriID','franchiseID', 'gambar'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoriID');
    }

    public function franchise()
    {
        return $this->belongsTo(franchise::class, 'franchiseID');
    }
}
