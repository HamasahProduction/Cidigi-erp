<?php

namespace App\Http\Controllers\Seles;

use App\Http\Controllers\Controller;
use App\Models\Katalog;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        $katalog = Katalog::orderBy('updated_at','desc')->paginate(12);
        $data['katalog'] = $katalog;

        return view('pages.sales.katalog', $data);
    }
}
