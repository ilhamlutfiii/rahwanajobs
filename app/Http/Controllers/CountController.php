<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountController extends Controller
{
    public function updateViewCount()
    {
        // Logika untuk memperbarui jumlah views, simpan di database
        $setting = DB::table('settings')->first();
        $views = $setting->views + 1;

        DB::table('settings')->update(['views' => $views]);

        return response()->json(['views' => $views]);
    }

    public function getLikeCount()
    {
        // Ambil jumlah likes dari database
        $setting = DB::table('settings')->first();

        return response()->json(['likes' => $setting->likes]);
    }

    public function likeWebsite(Request $request)
    {
        // Logika untuk memperbarui jumlah likes, simpan di database
        $setting = DB::table('settings')->first();
        $likes = $setting->likes + 1;

        DB::table('settings')->update(['likes' => $likes]);

        return response()->json(['likes' => $likes]);
    }
}
