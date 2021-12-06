<?php

namespace App\Http\Controllers\Seles;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // $param['insertupdatedelete']= url('ctrl/statuses/insert-update-delete');
        // $param['getData']           = url('ctrl/statuses/data');
        
        $data['token']      = csrf_token();
        $data['menu']       = 'table_order';
        $data['penjualan']  = [];

        return view('pages.sales.table_penjualan', $data);
    }

    public function getData(Datatables $datatables, Request $request)
    {
        $q = Penjualan::query()
                ->select(
                    'id',
                    'invoice',
                    'nama_pelanggan',
                    'id_user',
                    'json_detail',
                    'ppn',
                    'bayar',
                    'changedue',
                    'is_status',
                    'created_at as created',
                    'updated_at as modify'
                );

        return $datatables->eloquent($q)
                        ->editColumn('modify', function ($x) {
                            if($x->modify!='') $tgl = $x->modify;
                            elseif($x->created!='') $tgl = $x->created;
                            else return '01.01.2020 00:00';
                            $date = date_create($tgl);
                            return date_format($date,"d.m.Y H:i");
                        })
                        ->removeColumn('created')
                        ->make();
        
    }
}
