<?php

namespace App\Http\Controllers\MaterialUnit;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\MaterialUnit;
use App\Models\Unit;
use Illuminate\Http\Request;

class MaterialUnitController extends Controller
{
    public function index()
    {
        $data = MaterialUnit::all();
        // dd($data);
        return view('pages.material.material_unit.index', compact('data'));
    }
    
    public function create()
    {
        $material = Material::all();
        $unit = Unit::all();
        return view('pages.material.material_unit.create', compact('material','unit'));

    }

    public function store(Request $request)
    {
        $unit_id    =$request->unit;
        dd($unit_id);
        $materialunit = MaterialUnit::create([
            'material_id' => $request->material_id,
            'biaya' => $request->biaya,
            'qty' => $request->qty,
        ]);

    }
}
