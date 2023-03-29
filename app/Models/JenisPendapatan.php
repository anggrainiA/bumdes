<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPendapatan extends Model
{
    use HasFactory;
    public $table='jenispendapatan';
    protected $guarded=[];

    protected $primaryKey = 'id';
    public $incrementing = false;
    
    // protected $fillable = ['name', 'password', ];
    public $timestamps = false;
}
