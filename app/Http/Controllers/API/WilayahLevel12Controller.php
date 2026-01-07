<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WilayahLevel12;
use Illuminate\Support\Facades\DB;

class WilayahLevel12Controller extends Controller
{
    public function nearest(Request $request)
    {
        // Ambil dari query string ?lat=...&lng=...
        $request->validate([
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
        ]);

        $lat = $request->query('lat');
        $lng = $request->query('lng');

        $wilayah = DB::table('wilayah_level_1_2')
            ->select('*', DB::raw("(
            6371 * acos(
                cos(radians($lat)) *
                cos(radians(lat)) *
                cos(radians(lng) - radians($lng)) +
                sin(radians($lat)) *
                sin(radians(lat))
            )
        ) AS distance"))
            ->orderBy('distance')
            ->limit(1)
            ->first();

        return response()->json([
            'success' => true,
            'data' => $wilayah
        ]);
    }
}
