<?php

namespace App\Http\Controllers\FormulaItem;

use App\Http\Controllers\Controller;
use App\Models\FormulaItem;
use Illuminate\Http\Request;

class FormulaItemController extends Controller
{
    public function index(Request $request)
    {

        $is_trash           = $request->get('status') == 'trash';

    	$records            = FormulaItem::query();
        $formula_item_count = $records->count();

        $trashes            = FormulaItem::onlyTrashed()->orderBy('deleted_at','desc');
        $trash_count        = $trashes->count();

        $records            = $is_trash ? $trashes->get() : $records->get();

        return view('pages.formula_item.index', compact('is_trash', 'records','formula_item_count','trashes', 'trash_count',));
    }

    public function create()
    {
        return view('pages.formula_item.create');
    }

    public function store(Request $request)
    {

        FormulaItem::create([
            'nama'    => $request->nama,
        ]);

        return redirect()->route('formula-item.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $formula_item   = FormulaItem::find($id);
        return view('pages.formula_item.edit', compact('formula_item'));
    }

    public function update(Request $request, $id)
    {
        $formula_item = FormulaItem::where('id',$id)->first();
        if(!$formula_item)
        {
            return redirect()->route('formula-item.index')->with('success', 'Task Updated Successfully!');
        }

        $formula_item->nama = $request->nama;
        $formula_item->save();

        return redirect()->route('formula-item.index')->with('msg',['type'=>'success','text'=>'' .$formula_item->nama. ' berhasil diupdate!']);

    }

    public function delete($id)
    {
        FormulaItem::where('id',$id)->delete();
        return redirect()->route('formula-item.index')->with('msg',['type'=>'success','text'=>'formula item berhasil dihapus!']);
    }

    public function destroy($id)
    {
        FormulaItem::where('id',$id)->forceDelete();
        return redirect()->route('formula-item.index')->with('msg',['type'=>'success','text'=>'formula item berhasil dihapus!']);
    }

    public function restore($id)
    {
        FormulaItem::where('id',$id)->restore();
        return redirect()->route('formula-item.index')->with('msg',['type'=>'success','text'=>'formula item berhasil di Restore!']);
    }

}
