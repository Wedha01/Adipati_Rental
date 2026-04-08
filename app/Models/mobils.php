<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobils extends Model
{
    use HasFactory;


    protected $fillable = [
        'file',
        'status',
        'unit',
        'interior_image',
        'feature'
    ];
}
