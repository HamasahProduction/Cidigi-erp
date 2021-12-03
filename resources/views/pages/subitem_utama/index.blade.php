@extends('dashboard')
@push('more-css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <style type="text/css">
        table.dataTable tbody>tr.selected, table.dataTable tbody>tr>.selected {
            background-color: #23b7e5;
            color: #fff;
        }
    </style>
@endpush
@section('content')

    <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <section class="card">
                    <div class="card-body">
                        <input type="hidden" id="formula_utama_id" value="">
                       <table class="table table-bordered table-hover" id="table-formula-utama" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Formula id</th>
                                    <th class="text-center">Formula Utama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($formula_utama->count()>0)
                                    @foreach($formula_utama as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->nama }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Nama Formula : <span id="nama-formula" class="badge badge-info">-</span>
                            <a href="{{ route('subitem-utama.create') }}" class="btn btn-primary pull-right">Tambah Data</a>

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table-formula-item" class="table table-bordered table-striped table-hover dataTable" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">Bahan</th>
                                    <th class="text-center">Kebutuhan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
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

   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.4/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.4/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <script src="{{ asset('template/assets/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
        var table_formula_utama = null;
        var table_formula_item = null;
        $(document).ready(function(){
            table_formula_utama = $('#table-formula-utama').DataTable({
                select: {
                    style: 'single'
                },
                "order":[[0,"asc"]],
                "lengthChange": false,
                "pageLength": 20,
                "pagingType":"simple",
                "searching": false,
                "columns" :
                [
                    {
                        "class":"text-center",
                        "visible":false
                    },
                    {

                        "class":"text-left",
                    },
                ],
            });
            table_formula_item = $('#table-formula-item').DataTable({
                "paging":   false,
                "searching": false,
                "ajax" :{
                    "url" : "{{ route('subitem-utama.get') }}",
                    "type": "GET",
                    "DataType":"JSON",
                    "data":function(params){
                        params.formula_utama_id = $('#formula_utama_id').val();
                    }
                },

                "columns" : [
                    {
                        "data" : "formula_items.nama",
                        "class":"text-center",
                    },

                     {
                        "data" : "jumlah",
                        "class":"text-center",
                    },

                    {
                        "data": null,
                        "class":"text-center",
                        "render": function(data){
                            return data.id == null ? '':'<button type="button" title="delete" onclick="willRemove(\''+data.id+'\',\'DELETE\')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>';
                        }
                    }
                ]
            });

            table_formula_utama.on( 'select', function ( e, dt, type, indexes ){
                    var rowData = table_formula_utama.row( indexes ).data();
                    $('#formula_utama_id').val(rowData[0]);
                    $('#nama-formula').text(rowData[1]);
                    table_formula_item.rows().remove().draw();
                    table_formula_item.row.add(
                        {
                        'jumlah':'<i class="fa fa-spinner fa-spin"></i>',
                        'formula_items':{
                            'nama':'<i class="fa fa-spinner fa-spin"></i>',
                        },
                    },).draw(false);
                    table_formula_item.ajax.reload(null,false);
                });


        });

        function execRemove(method, id) {
            $("#action-form").attr('action', 'subitem-utama/delete/' + id);
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
    </script>
@endpush
