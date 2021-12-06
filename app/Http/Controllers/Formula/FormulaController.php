<?php

namespace App\Http\Controllers\Formula;

use App\Http\Controllers\Controller;
use App\Models\Formula;
use Illuminate\Http\Request;

class FormulaController extends Controller
{
    public function index(Request $request)
    {
        $is_trash       = $request->get('status') == 'trash';

    	$records        = Formula::query();
        $formula_count  = $records->count();

        $trashes        = Formula::onlyTrashed()->orderBy('deleted_at','desc');
        $trash_count    = $trashes->count();

        $records        = $is_trash ? $trashes->get() : $records->get();

        return view('pages.formula.index', compact('is_trash', 'records', 'formula_count','trashes', 'trash_count'));
    }

    public function create()
    {
        return view('pages.formula.create');
    }

    public function store(Request $request)
    {

        Formula::create([
            'nama'=>$request->nama,
            'status'=>$request->status,
        ]);

        return redirect()->route('formula.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $formula = Formula::find($id);
        return view('pages.formula.edit', compact('formula'));
    }

    public function update(Request $request, $id)
    {
        $formula = Formula::where('id',$id)->first();

        if(!$formula)
        {
            return redirect()->route('formula.index')->with('success', 'Task Updated Successfully!');
        }

        $formula->nama   = $request->nama;
        $formula->status = $request->status;
        $formula->save();

        return redirect()->route('formula.index')->with('msg',['type'=>'success','text'=>'' .$formula->nama. ' berhasil diupdate!']);
    }

    public function delete($id)
    {
        Formula::where('id',$id)->delete();
        return redirect()->route('formula.index')->with('msg',['type'=>'success','text'=>'formula berhasil dihapus!']);
    }

    public function destroy($id)
    {
        Formula::where('id',$id)->forceDelete();
        return redirect()->route('formula.index')->with('msg',['type'=>'success','text'=>'formula berhasil dihapus!']);
    }

    public function restore($id)
    {
        Formula::where('id',$id)->restore();
        return redirect()->route('formula.index')->with('msg',['type'=>'success','text'=>'formula berhasil di Restore!']);
    }
}
