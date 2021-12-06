<?php

namespace App\Http\Controllers\EstimasiStokUtama;

use App\Http\Controllers\Controller;
use App\Models\EstimasiStokUtama;
use Illuminate\Http\Request;

class EstimasiStokUtamaController extends Controller
{
    public function index()
    {
        $data = EstimasiStokUtama::all();
        return view('pages.estimasi_stokitem.index');
    }
}
