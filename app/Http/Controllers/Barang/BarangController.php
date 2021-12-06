<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\MasterProduk;
use App\Models\Suplier;
use App\Models\Ukuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Datatables;

class BarangController extends Controller
{
    public function index(Request $request)
    {    $is_trash       = $request->get('status') == 'trash';
         $suplier        = Suplier::all();
         $satuan_ukuran  = Ukuran::all();

    	 $records        = Barang::query();
         $barang_count   = $records->count();

         $trashes        = Barang::onlyTrashed()->orderBy('deleted_at','desc');
         $trash_count    = $trashes->count();

         $records        = $is_trash ? $trashes->get() : $records->get();

        return view('pages.barang.index', compact(
                 'is_trash', 'records', 'barang_count','trashes','satuan_ukuran','suplier', 'trash_count'
             ));
    }

    public function data(DataTables $datatable, Request $request)
    {
        
        $suplier = $request->input('suplier_id');
        $satuan_ukuran = $request->input('satuan_ukuran_id');
        $data_jenis_barang = $request->input('jenis_barang');
        // return ($suplier_id);
        $data = Barang::query()
                ->select(
                'kode',
                'nama',
                'suplier_id',
                'jenis_barang',
                'satuan_ukuran_id',
                'jumlah_total',
                // 'ukuran',
                'created_at',
                'deleted_at',
                );

        if( $suplier !='' ) $data = $data->where('suplier_id', $suplier);
        if( $satuan_ukuran !='' ) $data = $data->where('satuan_ukuran_id', $satuan_ukuran);
        if( $data_jenis_barang !='' ) $data = $data->where('jenis_barang', $data_jenis_barang);
        
        return $datatable->Eloquent($data)
            ->editColumn('suplier_id', function($b){
                return $b->suplier->nama;
        })
        ->editColumn('satuan_ukuran_id', function($b){
                return $b->satuanUkuran->nama;
        }) 
        ->make();
    }

    public function create()
    {
        $suplier        = Suplier::all();
        $satuan_ukuran  = Ukuran::all();
      
        return view('pages.barang.create',compact('suplier','satuan_ukuran'));
    }

    public function store(Request $request)
    {
        $kode               = $request->kode;
        $nama               = $request->nama;
        $suplier_id         = $request->suplier_id;
        $ukuran             = $request->ukuran;
        $harga_jual         = $request->harga_jual;
        $satuan_ukuran_id   = $request->satuan_ukuran_id;
        $jumlah_total       = $request->jumlah_total;
        $jumlah_min         = $request->jumlah_min;
        $jenis_barang       = $request->jenis_barang;

       for ($i=0; $i < count($kode); $i++) {
           $save_barang = [
            'kode'              =>$kode[$i],
            'nama'              =>$nama[$i],
            'suplier_id'        =>$suplier_id[$i],
            'ukuran'            =>$ukuran[$i],
            'harga_jual'        =>$harga_jual[$i],
            'satuan_ukuran_id'  =>$satuan_ukuran_id[$i],
            'jumlah_total'      =>$jumlah_total[$i],
            'jumlah_min'        =>$jumlah_min[$i],
            'jenis_barang'      =>$jenis_barang[$i],
            'is_status'         =>0,
           ];
           DB::table('barang')->insert($save_barang);
       }
        return redirect()->route('barang.index')->with('success', 'Data Berhasil Ditambahkan!');
    }


    public function edit(Request $request, $id)
    {
        $barang         = Barang::find($id);
        $produk         = MasterProduk::all();
        $satuan_ukuran  = Ukuran::all();

        return view('pages.barang.edit', compact('barang', 'produk', 'satuan_ukuran'));
    }


    public function update(Request $request, $id)
    {
        $produk = MasterProduk::where('id', $request->produk_master_id)->first();
        $barang = Barang::where('id',$id)->first();

        if(!$barang)
        {
            return redirect()->route('barang.index')->with('success', 'Task Updated Successfully!');
        }

        $barang->kode             = $request->kode;
        $barang->nama             = $produk->nama;
        $barang->produk_master_id = $request->produk_master_id;
        $barang->ukuran           = $request->ukuran;
        $barang->satuan_ukuran_id = $request->satuan_ukuran_id;
        $barang->jumlah_total     = $request->jumlah_total;
        $barang->jumlah_min       = $request->jumlah_min;
        $barang->jenis_barang     = $request->jenis_barang;
        $barang->is_status        = $request->is_status;
        $barang->save();

        return redirect()->route('barang.index')
                ->with('msg',['type'=>'success','text'=>'' .$barang->nama. ' berhasil diupdate!']);

    }


    public function delete($id)
    {
        Barang::where('id',$id)->delete();

        return redirect()->route('barang.index')
                         ->with('msg',['type'=>'success','text'=>'Barang berhasil dihapus!']);
    }

    public function destroy($id)
    {
        Barang::where('id',$id)->forceDelete();

        return redirect()->route('barang.index')
                         ->with('msg',['type'=>'success','text'=>'Barang berhasil dihapus!']);
    }

    public function restore($id)
    {
        Barang::where('id',$id)->restore();
        return redirect()->route('barang.index')
                         ->with('msg',['type'=>'success','text'=>'Barang berhasil di Restore!']);
    }
}
