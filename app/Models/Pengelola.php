<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengelola extends Authenticatable
{
    use HasFactory;
    public $table='pengelolas';
    protected $guarded=[];

    protected $primaryKey = 'id';
    public $incrementing = false;
    
    // protected $fillable = ['name', 'password', ];
    protected $hidden = ['password'];
    public $timestamps = false;
}
