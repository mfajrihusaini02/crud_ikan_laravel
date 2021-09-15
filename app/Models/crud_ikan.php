<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crud_ikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'harga',
        'jenis_ikan',
        'penjual',
        'gambar',
    ];
}
