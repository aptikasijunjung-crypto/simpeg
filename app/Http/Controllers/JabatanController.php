<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::orderBy('name', 'asc')->get();
        return view('modul.jabatan.home', ['data' => $data]);
    }

    public function modal(Request $request)
    {
        $id = $request->id;
        if (empty($id)) {
            $detail = [];
        } else {
            $detail = DB::table('jabatan')->where('id', $id)->get()->first();
        }
        return view('modul.jabatan.modal', ['id' => $id, 'detail' => $detail]);
    }

    public function store(Request $request)
    {
        $tabel = null;
        if (empty($request->name)) {
            $id = 0;
            $komen = "Nama Tidak Boleh Kosong";
        } else {
            if (empty($request->id)) {

                Jabatan::insert([
                    'name' => $request->name
                ]);
            } else {
                DB::table('jabatan')->where('id', $request->id)->update([
                    'name' => $request->name
                ]);
            }
            $id = 1;
            $komen = "Data Berhasil disimpan";
            $data = Jabatan::all();
            $tabel = tabelJabatan($data);
        }
        return response()->json([
            'id' => $id,
            'komen' => $komen,
            'tabel' => $tabel
        ]);
    }
}
