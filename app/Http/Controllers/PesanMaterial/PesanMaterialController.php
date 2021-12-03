<?php

namespace App\Http\Controllers\PesanMaterial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PesanMaterialController extends Controller
{
    public function index()
    {
        return view('pages.subitem.index');
    }
}
