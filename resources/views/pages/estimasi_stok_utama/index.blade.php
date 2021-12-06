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
                        <strong class="card-title">Estimasi Stok By Utama</strong><br>
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
                                <th >No</th>
                                <th >Nama Ukuran</th>
                                <th >AKSI</th>
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
@endsection

@push('more-js')
<script src="{{ asset('template/assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('template/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
@endpush
