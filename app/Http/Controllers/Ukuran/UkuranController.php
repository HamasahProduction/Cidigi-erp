<?php

namespace App\Http\Controllers\Ukuran;

use App\Http\Controllers\Controller;
use App\Http\Requests\SatuanUkuran\StoreRequest;
use App\Models\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller
{
    public function index(Request $request)
    {
        $is_trash       = $request->get('status') == 'trash';

    	$records        = Ukuran::query();
        $ukuran_count   = $records->count();

        $trashes        = Ukuran::onlyTrashed()->orderBy('deleted_at','desc');
        $trash_count    = $trashes->count();

        $records        = $is_trash ? $trashes->get() : $records->get();

        return view('pages.ukuran.index', compact('is_trash', 'records', 'ukuran_count','trashes', 'trash_count'));
    }

    public function create()
    {
        return view('pages.ukuran.create');
    }

    public function store(StoreRequest $request)
    {
        Ukuran::create([
            'nama'=>$request->nama,
        ]);

        return redirect()->route('satuan-ukuran.index')->with('success', 'Data Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id)
    {
        $ukuran = Ukuran::find($id);
        return view('pages.ukuran.edit', compact('ukuran'));
    }

    public function update(Request $request, $id)
    {
        $ukuran = Ukuran::where('id',$id)->first();
        if(!$ukuran)
        {
            return redirect()->route('satuan-ukuran.index')->with('success', 'Task Updated Successfully!');
        }

        $ukuran->nama = $request->nama;
        $ukuran->save();

        return redirect()->route('satuan-ukuran.index')->with('msg',['type'=>'success','text'=>'' .$ukuran->nama. ' berhasil diupdate!']);

    }

    public function delete($id)
    {
        Ukuran::where('id',$id)->delete();

        return redirect()->route('satuan-ukuran.index')->with('msg',['type'=>'success','text'=>'ukuran berhasil dihapus!']);
    }

    public function destroy($id)
    {
        Ukuran::where('id',$id)->forceDelete();

        return redirect()->route('satuan-ukuran.index')->with('msg',['type'=>'success','text'=>'ukuran berhasil dihapus!']);
    }

    public function restore($id)
    {
        Ukuran::where('id',$id)->restore();

        return redirect()->route('satuan-ukuran.index')->with('msg',['type'=>'success','text'=>'ukuran berhasil di Restore!']);
    }
}
