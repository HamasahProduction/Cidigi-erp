<?php

namespace App\Http\Controllers\Seles;

use App\Http\Controllers\Controller;
use App\Models\Penawaran;
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function index(Request $request)
    {
        $tgl = date('Y-m-d H:i:s');
        $penawaran = Penawaran::where('publish_at','<=',$tgl)
                                ->where('end_at','>',$tgl)
                                ->get();
        $data['penawaran'] = $penawaran;

        return view('pages.sales.penawaran', $data);
    }
}
