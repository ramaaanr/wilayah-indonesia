<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    // Nama tabel (jika tidak mengikuti konvensi plural)
    protected $table = 'wilayah';

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'kode',
        'nama',
    ];

    // Menonaktifkan timestamps (created_at, updated_at)
    public $timestamps = false;
}
