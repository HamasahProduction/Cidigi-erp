@extends('dashboard')

@push('more-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endpush
@section('content')
     <div class="content">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Tambah Barang
                            <a href="javascript:void(0)" class="btn btn-success pull-right" id="addRow">+</a>
                        </div>
                        <div class="card-body ">
                            <form class="form-horizontal" action="{{route('barang.store')}}" method="post" class="">
                                @csrf
                            <table class="table table-bordered table-responsive" id="tabel-barang">
                                <thead>
                                    <tr>
                                        <th>Kode Barang</th>
                                        <th>Nama</th>
                                        <th>Suplier</th>
                                        <th>Ukuran</th>
                                        <th>Satuan Ukuran</th>
                                        <th>Harga Jual</th>
                                        <th>Jumlah Total</th>
                                        <th>Jumlah Minimal</th>
                                        <th>Jenis Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="kode[]" class="form-control" required></td>
                                        <td><input type="text" name="nama[]" class="form-control"required></td>
                                        <td>
                                            <select name="suplier_id[]" class="form-control suplier" required>
                                                <option value="">Pilih Suplier</option>
                                                    @foreach($suplier as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" min="0" name="ukuran[]" class="form-control" required></td>
                                        <td>
                                            <select name="satuan_ukuran_id[]" class="form-control satuan-ukuran" required>
                                                <option value="">Pilih Ukuran</option>
                                                    @foreach($satuan_ukuran as $data)
                                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                    @endforeach
                                            </select>
                                        </td>
                                        <td><input type="number" min="0" name="harga_jual[]" class="form-control" required></td>
                                        <td><input type="number" min="0" name="jumlah_total[]" class="form-control" required></td>
                                        <td><input type="number" min="0" name="jumlah_min[]" class="form-control" required></td>
                                        <td>
                                            <select required name="jenis_barang[]" class="custom-select jenis_barang " required>
                                                <option value="">Pilih Jenis Barang</option>
                                                <option value="bahan_baku">Bahan Baku</option>
                                                <option value="bahan_setengah_jadi">Bahan Setengah Jadi</option>
                                                <option value="bahan_jadi">Bahan Jadi</option>
                                            </select>
                                        </td>
                                        <td><a href="javascript:void(0)" class="btn btn-danger" id="deleteRow">-</a></td>
                                    </tr>
                                </tbody>
                            </table>

                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('barang.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
                                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
@push('more-js')
    <script src="{{ asset('template/assets/js/core/jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        let baris = 1
        $(document).on('click', '#addRow', function(){
            baris = baris + 1
            var html = "<tr id='baris'"+baris+">"
                    html+="<td><input type='text' name='kode[]' class='form-control' required=''></td>"
                    html+="<td><input type='text' name='nama[]' class='form-control' required=''></td>"
                    html+="<td><select name='suplier_id[]' class='form-control' required=''><option value=''>Pilih Suplier</option>"
                    html+="@foreach($suplier as $data)<option value='{{ $data->id }}'>{{ $data->nama }}</option>@endforeach</select>"
                    html+="</td>"
                    html+="<td><input type='number' min='0' name='ukuran[]' class='form-control' required=''></td>"
                    html+="<td>"
                    html+="<select name='satuan_ukuran_id[]'class='form-control' required=''><option value=''>Pilih Ukuran</option>"
                    html+="@foreach($satuan_ukuran as $data)<option value='{{ $data->id }}'>{{ $data->nama }}</option>@endforeach</select>"
                    html+="</td>"
                    html+="<td><input type='number' min='0' name='harga_jual[]' class='form-control' required=''></td>"
                    html+="<td><input type='number' min='0' name='jumlah_total[]' class='form-control' required=''></td>"
                    html+="<td><input type='number' min='0' name='jumlah_min[]' class='form-control' required=''></td>"
                    html+="<td>"
                    html+="<select required='' name='jenis_barang[]' class='custom-select @error('jenis_barang') is-invalid @enderror'>"
                    html+="<option value=''>Pilih Jenis Barang</option>"
                    html+="<option value='bahan_baku'>Bahan Baku</option>"
                    html+="<option value='bahan_setengah_jadi'>Bahan Setengah Jadi</option>"
                    html+="<option value='bahan_jadi'>Bahan Jadi</option></select>"
                    html+="</td>"
                    html+="<td><a href='javascript:void(0)' class='btn btn-danger' data-row='baris' id='deleteRow'>-</a></td>"
                html +="</tr>"

                $('#tabel-barang').append(html);
        })

        $(document).ready(function(){
            $('.suplier').select2({
                theme:'bootstrap4',
                'placholder':'pilih barang'
            });
            $('.ukuran').select2({
                theme:'bootstrap4',
                'placholder':'pilih ukuran'
            });
        });

        $(document).on('click', '#deleteRow', function(){
            let deleteRow = $(this).data('row')
            console.log(deleteRow)
            $('#' + deleteRow).remove()
        });
    });

    </script>
@endpush
