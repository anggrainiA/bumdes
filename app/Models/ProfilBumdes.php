<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilBumdes extends Model
{
    use HasFactory;
    public $table='ProfilBumdes';
    protected $guarded=[];

    protected $primaryKey = 'id';
    public $incrementing = false;
    
    // protected $fillable = ['name', 'password', ];
    public $timestamps = false;
}
