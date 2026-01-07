<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class WilayahController extends Controller
{
    // Ambil semua provinsi (kode tanpa titik)
    public function provinsi()
    {
        $data = Wilayah::whereRaw('LENGTH(kode) - LENGTH(REPLACE(kode, ".", "")) = 0')->get();

        return ResponseFormatter::success($data, 'Daftar provinsi berhasil diambil.');
    }

    // Ambil kabupaten berdasarkan kode provinsi
    public function kabupaten($kodeProvinsi)
    {
        $data = Wilayah::where('kode', 'LIKE', $kodeProvinsi . '.%')
            ->whereRaw('LENGTH(kode) - LENGTH(REPLACE(kode, ".", "")) = 1')
            ->get();

        return ResponseFormatter::success($data, 'Daftar kabupaten berhasil diambil.');
    }

    // Ambil kecamatan berdasarkan kode kabupaten
    public function kecamatan($kodeKabupaten)
    {
        $data = Wilayah::where('kode', 'LIKE', $kodeKabupaten . '.%')
            ->whereRaw('LENGTH(kode) - LENGTH(REPLACE(kode, ".", "")) = 2')
            ->get();

        return ResponseFormatter::success($data, 'Daftar kecamatan berhasil diambil.');
    }

    // Ambil kelurahan berdasarkan kode kecamatan
    public function kelurahan($kodeKecamatan)
    {
        $data = Wilayah::where('kode', 'LIKE', $kodeKecamatan . '.%')
            ->whereRaw('LENGTH(kode) - LENGTH(REPLACE(kode, ".", "")) = 3')
            ->get();

        return ResponseFormatter::success($data, 'Daftar kelurahan berhasil diambil.');
    }
}
