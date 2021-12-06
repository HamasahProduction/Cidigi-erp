@extends('dashboard')

@section('content')
     <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-8 offset-3">
                    <div class="card">
                        <div class="card-header">Tambah Unit</div>
                        <div class="card-body card-block">
                            <form class="form-horizontal" action="{{ route('unit.store') }}" method="post" >
                                @csrf
                                <table class="table table-bordered table-responsive" id="tabel-unit">
                                    <thead>
                                        <tr>
                                            <th>Nama Unit</th>
                                            <th>harga</th>
                                            <th>jumlah</th>
                                            <th><a href="javascript:void(0)" class="btn btn-success " id="addRow">+</a></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" name="nama_unit[]" class="form-control" required></td>
                                            <td><input type="number" name="harga[]" class="form-control" min="0" required></td>
                                            <td><input type="number" name="stok_unit[]" class="form-control" min="0" required></td>
                                            
                                            <td><a href="javascript:void(0)" class="btn btn-danger" id="deleteRow">-</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm pull-right">Tambah</button>
                                    <a href="{{route('unit.index')}}" class="btn btn-sm btn-primary-outline pull-right">kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection

@push('more-js')
   <script src="{{asset('template/assets/js/core/jquery.min.js')}}"></script>

<script>
$(document).ready(function(){
let baris = 1

    $(document).on('click', '#addRow', function(){
    baris = baris + 1
    var html ="<tr id='baris'"+baris+">"
            html += "<td><input type='text' name='nama_unit[]' class='form-control' required></td>"
            html +="<td><input type='number' name='harga[]' class='form-control' min='0' required></td>"
            html +="<td><input type='number' name='stok_unit[]' class='form-control' min='0' required></td>"

            
            html +="<td><a href='javascript:void(0)' class='btn btn-danger' id='deleteRow' data-row='baris'>-</a></td>"
        html +="</tr>"
        $('#tabel-unit').append(html);
    })

    $(document).on('click', '#deleteRow', function(){
         let deleteRow = $(this).data('row')
         $('#' + deleteRow).remove()
     });
});
</script>
@endpush
