<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    public $table='jasa';
    protected $guarded=[];

    protected $primaryKey = 'id_jasa';
    public $incrementing = false;
    
    // protected $fillable = ['name', 'password', ];
    public $timestamps = false;
}
