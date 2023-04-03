<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    public $table='pelanggans';
    protected $guarded = [];
    public $incrementing = false;
    
    protected $primaryKey = 'id';
    public $timestamps = false;
}
