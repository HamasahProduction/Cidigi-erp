<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
        $data = Unit::all();
        return view('pages.unit.index', compact('data'));
    }
    
    public function create()
    {
        return view('pages.unit.create');
    }

    public function store(Request $request)
    {
        $nama_unit  = $request->nama_unit;
        $harga      = $request->harga; 
        $stok_unit  = $request->stok_unit;
        

        for ($i=0; $i < count($nama_unit) ; $i++) { 
            
            $unit_save = [
                'nama_unit' => $nama_unit[$i],
                'harga'     => $harga[$i], 
                'stok_unit' => $stok_unit[$i],
                'created_at'=> Carbon::now(),
            ];
            DB::table('unit')->insert($unit_save);
        }
        return redirect()->route('unit.index')->with('success', 'Unit Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        return view('pages.unit.edit', compact('unit'));
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::find($id);
        $unit->nama_unit = $request->nama_unit;
        $unit->harga = $request->harga;
        $unit->stok_unit = $request->stok_unit;
        $unit->save();
        return redirect()->route('unit.index')->with('success', 'Unit Berhasil diupdate!');
    }
}
