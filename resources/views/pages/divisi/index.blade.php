@extends('dashboard')
@push('more-css')
      <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong><br>
                        <a href="{{ route('divisi.index') }}" class="{{ $is_trash ? 'text-success':'text-muted' }}"> All
                            <span class="badge badge-pill badge-info">{{ $divisi_count }}</span>
                        </a>
                        &nbsp; | &nbsp;
                        <a href="{{ route('divisi.index') }}?status=trash" class="{{ $is_trash ? 'text-muted':'text-danger' }}">
                            Trash
                            <span class="badge badge-pill badge-danger">{{ $trash_count }}</span>
                        </a>
                        <a href="{{route('divisi.create')}}" class="btn btn-sm btn-primary pull-right">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        @if( session('msg') )
                            <?php $msg = session('msg'); ?>
                                <div class="alert alert-{{ $msg['type'] }} alert-remove">
                                    {!! $msg['text'] !!}
                                </div>
                        @endif
                        <table id="datatable" class="table table-bordered table-striped table-hover" style="width: 100%;">
                            <thead class="text-primary">
                                <tr>
                                <th >NO</th>
                                <th >Nama Divisi</th>
                                <th >AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $row)
                                <tr>
                                    <td >{{ $loop->iteration }}</td>
                                    <td >{{ $row->nama}}</td>
                                    <td >
                                        @if($row->id != 0)
                                            @if( $row->deleted_at == null )
                                                <a href="{{ route('divisi.edit',$row->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                <button type="button" title="restore" onclick="willRemove('{{ $row->id }}','DELETE')" class="btn btn-danger btn-sm">Delete</a>
                                            @else
                                                <button type="button" class="btn btn-success btn-sm" onclick="restore('{{ $row->id }}')" title="Restore">Restore</button>
                                                <button type="button" title="destroy" onclick="willRemove('{{ $row->id }}','DESTROY')" class="btn btn-danger btn-sm">Destroy</button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script src="{{ asset('template/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
       $(document).ready(function(){
            $('#datatable').DataTable();
        });

        function execRemove(method, id) {
            $("#action-form").attr('action', 'divisi/delete/' + id);
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
            $("#action-form").attr('action', 'divisi/restore/' + id);
            $("#action-form input[name=_method]").val("POST");
            $("#action-form").submit();
        };
    </script>
@endpush