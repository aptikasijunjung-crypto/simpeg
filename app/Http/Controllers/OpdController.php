<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Opd;

class OpdController extends Controller
{
    public function index()
    {
        $data = Opd::all();
        return view('modul.opd.home', ['data' => $data]);
    }
}
