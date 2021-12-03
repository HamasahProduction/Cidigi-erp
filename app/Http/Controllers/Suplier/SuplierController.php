<?php

namespace App\Http\Controllers\Suplier;

use App\Http\Controllers\Controller;
use App\Models\MasterProduk;
use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    public function index(Request $request)
    {

        $is_trash       = $request->get('status') == 'trash';

    	$records        = Suplier::query();
        $suplier_count  = $records->count();

        $trashes        = Suplier::onlyTrashed()->orderBy('deleted_at','desc');
        $trash_count    = $trashes->count();

        $records        = $is_trash ? $trashes->get() : $records->get();

        return view('pages.suplier.index', compact(
                'is_trash', 'records', 'suplier_count','trashes', 'trash_count',
            ));
    }

    public function create()
    {
        $produk = MasterProduk::all();
        return view('pages.suplier.create', compact('produk'));
    }

    public function store(Request $request)
    {
        Suplier::create([
            'nama'      => $request->nama,
            'alamat'    => $request->alamat,
            'kontak'    => $request->kontak,
        ]);

        return redirect()->route('suplier.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $id = decodeID($id);
        $suplier = Suplier::find($id);
        return view('pages.suplier.edit', compact('suplier'));
    }

    public function update(Request $request, $id)
    {
        $suplier = Suplier::where('id',$id)->first();
        if(!$suplier)
        {
            return redirect()->route('suplier.index')->with('success', 'Task Updated Successfully!');
        }

        $suplier->nama   = $request->nama;
        $suplier->alamat = $request->alamat;
        $suplier->kontak = $request->kontak;
        $suplier->save();

        return redirect()->route('suplier.index')->with('msg',['type'=>'success','text'=>'' .$suplier->nama. ' berhasil diupdate!']);

    }

    public function delete($id)
    {
        Suplier::where('id',$id)->delete();

        return redirect()->route('suplier.index')->with('msg',['type'=>'success','text'=>'suplier berhasil dihapus!']);
    }

    public function destroy($id)
    {
        Suplier::where('id',$id)->forceDelete();

        return redirect()->route('suplier.index')->with('msg',['type'=>'success','text'=>'suplier berhasil dihapus!']);
    }

    public function restore($id)
    {
        Suplier::where('id',$id)->restore();

        return redirect()->route('suplier.index')->with('msg',['type'=>'success','text'=>'suplier berhasil di Restore!']);
    }
}
