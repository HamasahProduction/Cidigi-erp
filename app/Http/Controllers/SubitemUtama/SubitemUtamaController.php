<?php

namespace App\Http\Controllers\SubitemUtama;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\FormulaItem;
use App\Models\FormulaUtama;
use App\Models\Subitem;
use App\Models\SubitemUtama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubitemUtamaController extends Controller
{
    public function index(Request $request)
    {

        $formula_item   = FormulaItem:: all();
        $subitem        = SubitemUtama::groupBy('formula_utama_id')->select('formula_utama_id')->get();
        $formula_utama  = FormulaUtama::select('id','nama')->whereIn('id',$subitem ->pluck('formula_utama_id'))->get();

        return view('pages.subitem_utama.index', compact('formula_utama', 'formula_item', 'subitem'));
    }

    public function create()
    {
        $formula_utama  = FormulaUtama::select('id', 'nama')->get();
        $formula_item   = FormulaItem::all();

        return view('pages.subitem_utama.create', compact('formula_item', 'formula_utama'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // $jumlahItem = Subitem::select('formula_item_id','barang_id', 'jumlah')->where('formula_item_id', $request->formula_item_id)->first();
        // $jumlahBarang = $jumlahItem->jumlah;
        // // dd($jumlahBarang);
        // $cekBarang = Barang::select('id', 'jumlah_total')->where('id', $jumlahItem->barang_id)->first();
        // $jumlahBarangItem = $cekBarang->jumlah_total;
        // $data  = $jumlahBarang * $jumlahBarangItem;
        // $jumlahKebutuhan  = $request->jumlah;
        // $jumlahItemInput  = $jumlahKebutuhan * $data;
        // dd($jumlahItemInput);

        // if( $jumlahItemInput > $jumlahKebutuhan)
        // {
        //     return redirect()->route('subitem-utama.create')->with('info', 'Stock barang kurang!');
        // }

        $exists = SubitemUtama::where('formula_item_id', $request->formula_item_id)
                            ->where('formula_utama_id', $request->formula_utama_id)
                            ->get();

        if($exists->isNotEmpty())
        {
            return redirect()->route('subitem-utama.create')->with('info', 'Data Sudah Ditambahkan Sebelumnya!');
        }

        $formula_utama_id   = $request->formula_utama_id;
        $formula_item_id    = $request->formula_item_id;
        $jumlah             = $request->jumlah;

        $subutama = [];
        for ($i=0; $i < count($formula_item_id) ; $i++) {
            $subutama_save = [
                'formula_utama_id'  => $formula_utama_id,
                'formula_item_id'   => $formula_item_id[$i],
                'jumlah'            => $jumlah,
            ];
            array_push($subutama ,  $subutama_save);
        }
        DB::table('sub_formula_utama')->insert($subutama);

        return redirect()->route('subitem-utama.index')->with('toast_success', 'Data Berhasil ditambahkan!!');
    }

    public function get(Request $request)
    {
		$records = SubitemUtama::with('formulaItems:id,nama')
                        ->where('formula_utama_id',$request->formula_utama_id)
                        ->get();

        return response()->json(['data'=>$records]);
	}

    public function delete($id)
    {
        SubitemUtama::where('id',$id)->delete();
        return redirect()->route('subitem-utama.index')->with('msg',['type'=>'success','text'=>'subitem berhasil dihapus!']);
    }
}
