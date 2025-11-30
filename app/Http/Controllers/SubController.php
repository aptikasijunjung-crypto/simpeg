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
        $tabel = DB::select('SELECT a.id, a.title, a.sub_opd_id, b.name AS jabatan_name,
                            d.name as koordinator 
                            FROM 
                            posisi a LEFT JOIN posisi c ON a.koordinator_id=c.id
                            LEFT JOIN jabatan d ON c.jabatan_id=d.id, 
                            jabatan b WHERE a.jabatan_id=b.id AND a.sub_opd_id=?', [$request->id]);
        return view("modul.sub.modaljabatan", ['data' => $data, 'tabel' => $tabel]);
    }

    public function pilih(Request $request)
    {
        $data = DB::select('SELECT sub_opd_id, opd_id FROM sub_opd WHERE sub_opd_id=?', [$request->id])[0];
        $kode = $request->kode;
        if (empty($kode)) {
            $detail = [];
        } else {
            $detail = DB::select('SELECT a.id, a.title, b.id as jabatan_id, b.name AS jabatan_name FROM posisi a, jabatan b
                            WHERE
                            a.jabatan_id = b.id AND
                            a.id=? ', [$kode])[0];
        }
        return view('modul.sub.modalpilih', ['data' => $data, 'kode' => $kode, 'detail' => $detail]);
    }

    public function pilihjabatan(Request $request)
    {
        $id = 0;
        if (empty($request->jabatan_id)) {
            $komen = "Pilih Jabatan ";
        } else if (empty($request->title)) {
            $komen = "Masukkan Title Jabatan";
        } else {
            if (empty($request->kode)) {
                Posisi::insert([
                    'sub_opd_id' => $request->sub_opd_id,
                    'jabatan_id' => $request->jabatan_id,
                    'title' => $request->title,
                    'koordinator_id' => $request->koordinator_id
                ]);
                $id = 1;
                $komen = "Data Sukses Di masukkan";
            } else {
                DB::table('posisi')->where('id', $request->kode)->update([
                    'title' => $request->title
                ]);
                $id = 1;
                $komen = "Data Berhasil Dirubah";
            }
        }
        return response()->json([
            'id' => $id,
            'komen' => $komen,
        ]);
    }
}
