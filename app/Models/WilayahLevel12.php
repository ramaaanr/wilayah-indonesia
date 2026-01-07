<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WilayahLevel12 extends Model
{
    protected $table = 'wilayah_level_1_2';
    protected $primaryKey = 'kode';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'kode',
        'nama',
        'ibukota',
        'lat',
        'lng',
        'elv',
        'tz',
        'luas',
        'penduduk',
        'path',
        'status'
    ];
}
