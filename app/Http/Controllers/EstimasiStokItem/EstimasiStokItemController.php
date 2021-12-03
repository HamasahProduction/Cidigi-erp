<?php

namespace App\Http\Controllers\EstimasiStokItem;

use App\Http\Controllers\Controller;
use App\Models\EstimasiStokItem;
use Illuminate\Http\Request;

class EstimasiStokItemController extends Controller
{
    public function index()
    {
        $data = EstimasiStokItem::all();
        return view('pages.estimasi_stokitem.index', compact('data'));
    }
}
