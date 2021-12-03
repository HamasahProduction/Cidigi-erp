<?php

namespace App\Http\Controllers\Divisi;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index(Request $request)
    {
        $is_trash       = $request->get('status') == 'trash';

    	$records        = Divisi::query();
        $divisi_count   = $records->count();

        $trashes        = Divisi::onlyTrashed()->orderBy('deleted_at','desc');
        $trash_count    = $trashes->count();

        $records        = $is_trash ? $trashes->get() : $records->get();

        return view('pages.divisi.index', compact('is_trash', 'records', 'divisi_count','trashes', 'trash_count'));
    }

    public function create()
    {
        return view('pages.divisi.create');
    }

    public function store(Request $request){

        Divisi::create([
            'nama'=>$request->nama,
        ]);

        return redirect()->route('divisi.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {

        $divisi = Divisi::find($id);
        return view('pages.divisi.edit', compact('divisi'));

    }

    public function update(Request $request, $id)
    {
        $divisi = Divisi::where('id',$id)->first();
        if(!$divisi)
        {
            return redirect()->route('divisi.index')->with('success', 'Task Updated Successfully!');
        }

        $divisi->nama = $request->nama;
        $divisi->save();

        return redirect()->route('divisi.index')->with('msg',['type'=>'success','text'=>'' .$divisi->nama. ' berhasil diupdate!']);

    }

    public function delete($id)
    {
        Divisi::where('id',$id)->delete();
        return redirect()->route('divisi.index')->with('msg',['type'=>'success','text'=>'Divisi berhasil dihapus!']);
    }

    public function destroy($id)
    {
        Divisi::where('id',$id)->forceDelete();
        return redirect()->route('divisi.index')->with('msg',['type'=>'success','text'=>'Divisi berhasil dihapus!']);
    }

    public function restore($id)
    {
        Divisi::where('id',$id)->restore();
        return redirect()->route('divisi.index')->with('msg',['type'=>'success','text'=>'Divisi berhasil di Restore!']);
    }
}
