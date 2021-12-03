<?php

namespace App\Http\Controllers\Material;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\MaterialUnit;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function index()
    {
        $data = Material::all();
        return view('pages.material.index', compact('data'));
    }
    public function create()
    {
        $unit = Unit::all();
        return view('pages.material.create', compact('unit'));
    }
    public function store(Request $request)
    {
         $nama      = $request->nama;

    
         for ($i=0; $i < count($nama) ; $i++) { 
             $material_save = [
                'nama'      => $nama[$i],
                'created_at'=> Carbon::now(),
             ];
             
             $data = DB::table('material')->insert($material_save);
        }
        return redirect()->route('material.index')->with('success', 'Material Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $material = Material::find($id);
        $unit = Unit::all();
        return view('pages.material.edit', compact('unit', 'material'));
    }

    public function groupMaterial(Request $request,$id)
    {
            $material = Material::find($id);
            $unit = Unit::all();
            return view('pages.material.material_unit', compact('unit', 'material'));
            
    }

    public function groupSave(Request $request, $id)
    {
            $material = Material::where('id', $id)->first();
            
            $unit = $request->unit_id;
            $material = $request->id;
            $biaya = $request->biaya;
            $qty = $request->qty;
            
            $material_save = [];
            for ($i=0; $i < count($unit) ; $i++) { 
             $material_ = [
                'unit_id'      => $unit[$i],
                'material_id'      => $material,
                'biaya'      => $biaya[$i],
                'qty'      => $qty[$i],
                'created_at'=> Carbon::now(),
                ];
                array_push($material_save, $material_);
            }
            $data = DB::table('material_unit')->insert($material_save);
        return redirect()->route('material.index')->with('info', 'Data Gagal di simpan!');
    }
}
