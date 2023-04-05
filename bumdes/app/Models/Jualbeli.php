<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jualbeli extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function transaksi() 
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function barang() 
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
