<?php

namespace App\Http\Controllers\Divisi;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DivisiController extends Controller
{
    public function index()
    {
       $data = Divisi::get();
        if (request()->ajax()) {
            return datatables()->of($data)
                ->addColumn('aksi', function ($data) {
                    $button = " <button class='edit btn  btn-warning' id='" . $data->id . "' >Edit</button>";
                    $button .= " <button class='hapus btn  btn-danger' id='" . $data->id . "' >Hapus</button>";
                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('pages.divisi.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data       = new Divisi();
        $data->nama = $request->nama;
        $simpan = $data->save();
        if ($simpan) {
            return response()->json(['data' => $data, 'text' => 'data berhasi disimpan'], 200);
        } else {
            return response()->json(['data' => $data, 'text' => 'data berhasi disimpan']);
        }
    }

    public function edit(Request $request)
    {

        $id = $request->id;
        $data = Divisi::find($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $id = $request->id;
        $datas = [
            'nama' => $request->nama,
        ];
        $data = Divisi::find($id);
        $simpan = $data->update($datas);
        if ($simpan) {
            return response()->json(['text' => 'berhasil diubah'], 200);
        } else {
            return response()->json(['text' => 'Gagal diubah'], 422);
        }
     
    }

    public function hapus(Request $request)
    {
        $id = $request->id;
        $data = Divisi::find($id);
        $data->delete();
        return response()->json(['text' => 'berhasil dihapus'], 200);
    }

}
