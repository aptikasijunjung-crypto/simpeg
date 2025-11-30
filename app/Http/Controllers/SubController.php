<?php

namespace App\Http\Controllers;

use App\Models\Posisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubController extends Controller
{
    public function index(Request $request)
    {
        $data = DB::table('sub_opd')->where('opd_id', $request->id)->get();
        return view('modul.sub.modal', ['data' => $data]);
    }

    public function modaljabatan(Request $request)
    {
        $data = DB::select('SELECT sub_opd_id FROM sub_opd WHERE sub_opd_id=?', [$request->id])[0];
        $tabel = DB::select('SELECT a.id, a.title, b.name AS jabatan_name 
                            FROM 
                            posisi a, jabatan b WHERE a.jabatan_id=b.id');
        return view("modul.sub.modaljabatan", ['data' => $data, 'tabel' => $tabel]);
    }

    public function pilih(Request $request)
    {
        $data = DB::select('SELECT sub_opd_id, opd_id FROM sub_opd WHERE sub_opd_id=?', [$request->id])[0];
        $kode = $request->kode;
        return view('modul.sub.modalpilih', ['data' => $data, 'kode' => $kode]);
    }

    public function pilihjabatan(Request $request)
    {
        $id = 0;
        if (empty($request->jabatan_id)) {
            $komen = "Pilih Jabatan " . $request->sub_opd_id;
        } else if (empty($request->title)) {
            $komen = "Masukkan Title Jabatan";
        } else {
            Posisi::insert([
                'sub_opd_id' => $request->sub_opd_id,
                'jabatan_id' => $request->jabatan_id,
                'title' => $request->title,
                'koordinator_id' => $request->koordinator_id
            ]);
            $id = 1;
            $komen = "Data Sukses Di masukkan";
        }
        return response()->json([
            'id' => $id,
            'komen' => $komen,
        ]);
    }
}
