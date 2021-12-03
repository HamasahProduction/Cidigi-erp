<?php

namespace App\Http\Controllers\MasterProduk;

use App\Http\Controllers\Controller;
use App\Models\MasterProduk;
use App\Models\Suplier;
use Illuminate\Http\Request;

class MasterProdukController extends Controller
{
    public function index(Request $request)
    {
        $is_trash       = $request->get('status') == 'trash';

    	$records        = MasterProduk::query();
        $produk_count   = $records->count();

        $trashes        = MasterProduk::onlyTrashed()->orderBy('deleted_at','desc');
        $trash_count    = $trashes->count();

        $records        = $is_trash ? $trashes->get() : $records->get();

        return view('pages.master_produk.index', compact('is_trash', 'records', 'produk_count','trashes', 'trash_count'));
    }

    public function create()
    {
        $suplier = Suplier::all();
        return view('pages.master_produk.create', compact('suplier'));
    }

    public function store(Request $request)
    {
        MasterProduk::create([
            'nama'=>$request->nama,
            'suplier_id'=>$request->suplier_id,
        ]);

        return redirect()->route('master-produk.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $ukuran = MasterProduk::find($id);
        return view('pages.master_produk.edit', compact('ukuran'));
    }

    public function update(Request $request, $id)
    {
        $ukuran = MasterProduk::where('id',$id)->first();
        if(!$ukuran)
        {
            return redirect()->route('master-produk.index')->with('success', 'Task Updated Successfully!');
        }

        $ukuran->nama = $request->nama;
        $ukuran->save();

        return redirect()->route('master-produk.index')->with('msg',['type'=>'success','text'=>'' .$ukuran->nama. ' berhasil diupdate!']);

    }

    public function delete($id)
    {
        MasterProduk::where('id',$id)->delete();

        return redirect()->route('master-produk.index')->with('msg',['type'=>'success','text'=>'ukuran berhasil dihapus!']);
    }

    public function destroy($id)
    {
        MasterProduk::where('id',$id)->forceDelete();

        return redirect()->route('master-produk.index')->with('msg',['type'=>'success','text'=>'ukuran berhasil dihapus!']);
    }

    public function restore($id)
    {
        MasterProduk::where('id',$id)->restore();

        return redirect()->route('master-produk.index')->with('msg',['type'=>'success','text'=>'ukuran berhasil di Restore!']);
    }
}
