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
    public function koordinator(Request $request)
    {
        $term = '%' . $request->term . '%';
        $data = DB::select("SELECT b.name AS label, a.id as value, c.sub_opd_name
                            FROM posisi a, jabatan b, sub_opd c WHERE
                            a.jabatan_id=b.id AND
                            a.sub_opd_id=c.sub_opd_id AND
                             CONCAT_WS(',', b.name, b.id, c.sub_opd_name) LIKE ? LIMIT 0,10", [$term]);
        return response()->json($data);
    }
}
