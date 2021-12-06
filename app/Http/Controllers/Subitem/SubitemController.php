<?php

namespace App\Http\Controllers\Subitem;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Formula;
use App\Models\FormulaItem;
use App\Models\Subitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubitemController extends Controller
{
    public function index(Request $request)
    {

        $barang     = Barang:: all();
        $subitem    = SubItem::groupBy('formula_item_id')->select('formula_item_id')->get();
        $formula_item    = FormulaItem::select('id','nama')->whereIn('id',$subitem ->pluck('formula_item_id'))->get();

        return view('pages.subitem.index', compact('formula_item', 'barang', 'subitem'));
    }

    public function create()
    {
        $formula_item     = FormulaItem::select('id', 'nama')->get();
        $barang_item = Barang::all();

        return view('pages.subitem.create', compact('barang_item', 'formula_item'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // $cekBarang = Barang::select('jumlah_total', 'id')->where('id', $request->barang_id)->first();
        // $jumlahBarang  = $cekBarang->jumlah_total;
        // $jumlahKebutuhan  = $request->jumlah;

        // if( $jumlahKebutuhan > $jumlahBarang)
        // {
        //     return redirect()->route('subitem.create')->with('info', 'Stock barang kurang!');
        // }
        // else{
        //     $exists = Subitem::where('barang_id', $request->barang_id)
        //                         ->where('formula_item_id', $request->formula_item_id)
        //                         ->get();

        //     if($exists->isNotEmpty())
        //     {
        //         return redirect()->route('subitem.create')->with('info', 'Data Sudah Ditambahkan Sebelumnya!');
        //     }
        //     else{
        //         SubItem::create([
        //             'formula_item_id'=> $request->formula_item_id,
        //             'barang_id'     => $request->barang_id,
        //             'jumlah'        => $request->jumlah,
        //         ]);
        //     }

        // }

        $exists = Subitem::where('barang_id', $request->barang_id)
        ->where('formula_item_id', $request->formula_item_id)
        ->get();

        if($exists->isNotEmpty())
        {
        return redirect()->route('subitem.create')->with('info', 'Data Sudah Ditambahkan Sebelumnya!');
        }
        else{

            $formula_item_id    = $request->formula_item_id;
            $barang_id          = $request->barang_id;
            $jumlah             = $request->jumlah;

            $subitem = [];
            for ($i=0; $i < count($barang_id) ; $i++) {
                $subitem_save = [
                    'formula_item_id'   => $formula_item_id,
                    'barang_id'         => $barang_id[$i],
                    'jumlah'            => $jumlah,
                ];
                array_push($subitem ,  $subitem_save);
            }
            DB::table('subitem')->insert($subitem);
        }
        return redirect()->route('subitem.index')->with('toast_success', 'Data Berhasil ditambahkan!!');
    }

    public function get(Request $request)
    {
		$records = SubItem::with('barangGolonganFormula:id,nama,kode')
                        ->where('formula_item_id',$request->formula_item_id)
                        ->get();

        return response()->json(['data'=>$records]);
	}

    public function delete($id)
    {
        SubItem::where('id',$id)->delete();
        return redirect()->route('subitem.index')->with('msg',['type'=>'success','text'=>'subitem berhasil dihapus!']);
    }

}
