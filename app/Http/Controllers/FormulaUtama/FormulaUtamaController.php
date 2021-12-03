<?php

namespace App\Http\Controllers\FormulaUtama;

use App\Http\Controllers\Controller;
use App\Models\FormulaUtama;
use Illuminate\Http\Request;

class FormulaUtamaController extends Controller
{
    public function index(Request $request)
    {

        $is_trash           = $request->get('status') == 'trash';

    	$records            = FormulaUtama::query();
        $formula_utama_count= $records->count();

        $trashes            = FormulaUtama::onlyTrashed()->orderBy('deleted_at','desc');
        $trash_count        = $trashes->count();

        $records            = $is_trash ? $trashes->get() : $records->get();

        return view('pages.formula_utama.index', compact('is_trash', 'records','formula_utama_count','trashes', 'trash_count',));
    }

    public function create()
    {
        return view('pages.formula_utama.create');
    }

    public function store(Request $request){

        FormulaUtama::create([
            'nama'    => $request->nama,
        ]);

        return redirect()->route('formula-utama.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $formula_utama   = FormulaUtama::find($id);
        return view('pages.formula_utama.edit', compact('formula_utama'));
    }

    public function update(Request $request, $id)
    {
        $formula_utama = FormulaUtama::where('id',$id)->first();
        if(!$formula_utama)
        {
            return redirect()->route('formula-utama.index')->with('success', 'Task Updated Successfully!');
        }

        $formula_utama->nama = $request->nama;
        $formula_utama->save();

        return redirect()->route('formula-utama.index')->with('msg',['type'=>'success','text'=>'' .$formula_utama->nama. ' berhasil diupdate!']);

    }

    public function delete($id)
    {
        FormulaUtama::where('id',$id)->delete();
        return redirect()->route('formula-utama.index')->with('msg',['type'=>'success','text'=>'formula utama berhasil dihapus!']);
    }

    public function destroy($id)
    {
        FormulaUtama::where('id',$id)->forceDelete();
        return redirect()->route('formula-utama.index')->with('msg',['type'=>'success','text'=>'formula utama berhasil dihapus!']);
    }

    public function restore($id)
    {
        FormulaUtama::where('id',$id)->restore();
        return redirect()->route('formula-utama.index')->with('msg',['type'=>'success','text'=>'formula utama berhasil di Restore!']);
    }
}
