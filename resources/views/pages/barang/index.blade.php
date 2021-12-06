@extends('dashboard')
@push('more-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <style>
       .style-filter{
           margin-bottom: 20px;
       } 
    </style>
@endpush
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong><br>
                        <a href="{{ route('barang.index') }}" class="{{ $is_trash ? 'text-success':'text-muted' }}"> All
                            <span class="badge badge-pill badge-info">{{ $barang_count }}</span>
                        </a>
                        &nbsp; | &nbsp;
                        <a href="{{ route('barang.index') }}?status=trash" class="{{ $is_trash ? 'text-muted':'text-danger' }}">
                            Trash
                            <span class="badge badge-pill badge-danger">{{ $trash_count }}</span>
                        </a>
                        <a href="{{route('barang.create')}}" class="btn btn-sm btn-primary pull-right">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 style-filter">
                                <select required name="jenis_barang" id="jenis_barang" class="custom-select filter" required>
                                    <option value="">Filter Jenis Barang</option>
                                    <option value="bahan_baku">Bahan Baku</option>
                                    <option value="bahan_setengah_jadi">Bahan Setengah Jadi</option>
                                    <option value="bahan_jadi">Bahan Jadi</option>
                                </select>
                            </div>
                            <div class="col-md-4 style-filter">
                                <select name="suplier_id" class="form-control" id="suplier_id" required>
                                    <option value="">Filter Suplier</option>
                                        @foreach($suplier as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 style-filter">
                                <select name="satuan_ukuran_id" id="satuan_ukuran_id" class="form-control filter" required>
                                    <option value="">Filter Ukuran</option>
                                        @foreach($satuan_ukuran as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered table-striped table-hover table-data" style="width: 100%;">
                            <thead class="text-primary">
                                <tr>
                                <th >Kode barang</th>
                                <th >Nama barang</th>
                                <th >Suplier</th>
                                <th >Jenis Barang</th>
                                <!-- <th >Ukuran</th> -->
                                <th >Jumlah</th>
                                <th >Satuan</th>
                                <th >Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="action-form" action="" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <input type="hidden" name="id">
</form>
@endsection

@push('more-js')
  
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">

        var datatables = ''

       $(document).ready(function(){
           
        datatables = $('#datatable').DataTable({
                    processing   : true,
                    ServerSide   : true,
                    ajax         : {
                        url:"{{route('barang.data')}}",
                        type:"GET",
                        data:{
                            suplier_id:function(){ return $('#suplier_id option:selected').val() },
                            satuan_ukuran_id:function(){ return $('#satuan_ukuran_id option:selected').val() },
                            jenis_barang:function(){ return $('#jenis_barang option:selected').val() }
                        }
                    },
                    columns : [
                        {data: 'kode', name:'kode'},
                        {data: 'nama', name:'nama'},
                        {data: 'suplier_id', name:'suplier_id'},
                        {data: 'jenis_barang', name:'jenis_barang'},
                        // {data: 'ukuran', name:'ukuran'},
                        {data: 'jumlah_total', name:'jumlah_total'},
                        {data: 'satuan_ukuran_id', name:'satuan_ukuran_id'},
                        {data: null, name:'kode',
                            render:function (x,){
                                return '<a href="#" class="btn btn-success btn-sm">Edit</a>' +
                                        '<button type="button" title="restore" onclick="willRemove(\'\',\'DELETE\')" class="btn btn-danger btn-sm">Delete</a>';
                                 
                            }
                            
                        }
                    ]

                });
        });


    $('#suplier_id').on('change', function(){
        datatables.ajax.reload();
    });
    $('#jenis_barang').on('change', function(){
        datatables.ajax.reload(null,false);
    });
    $('#satuan_ukuran_id').on('change', function(){
        datatables.ajax.reload(null,false);
    });


        function execRemove(method, id) {
            $("#action-form").attr('action', 'barang/delete/' + id);
            $("#action-form input[name=_method]").val(method);
            $("#action-form").submit();
        }

        function willRemove(id, method) {
            swal({
                title: "Apakah Anda Yakin?",
                text: "anda yakin menghapus data ini?",
                icon: "warning",
                buttons: ["Batal", "Ya"]
            })
            .then(function(willDelete) {
                if (willDelete) {
                    if (method === "DELETE") execRemove('PATCH', id)
                    else execRemove('DELETE', id)
                }
            });
        };

        function restore (id) {
            $("#action-form").attr('action', 'barang/restore/' + id);
            $("#action-form input[name=_method]").val("POST");
            $("#action-form").submit();
        };
    </script>
@endpush
