<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;
    protected $fillable = ['userID', 'produkID', 'rating', 'komentar'];

    public function user()
    {
        return $this->belongsTo(User::class, 'userID');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produkID');
    }
}
