<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutocomplateController extends Controller
{
    public function pegawai(Request $request) {}



    public function jabatan(Request $request)
    {
        $term = '%' . $request->term . '%';
        $data = DB::select("SELECT name AS label, id as value 
                            FROM jabatan where CONCAT_WS(',', name, id) LIKE ? LIMIT 0,10", [$term]);
        return response()->json($data);
    }
}
