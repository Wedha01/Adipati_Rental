<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftaran extends Model
{
    use HasFactory;


    protected $fillable = ['nama', 'tanggal', 'jam', 'unit', 'driver_id', 'tambahan', 'status', 'harga_lunas'];
}
