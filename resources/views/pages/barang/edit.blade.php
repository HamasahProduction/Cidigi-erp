@extends('dashboard')
@push('more-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endpush
@section('content')
     <div class="content">
        <div class="col-md-10 offset-md-2">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">Tambah Barang</div>
                        <div class="card-body card-block">
                            <form action="{{route('barang.update', $barang->id)}}" method="post" class="">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-xl-3 ">Kode Barang</label>
                                    <div class="col-xl-9">
                                        <div class="input-group">
                                            <input  type="text"
                                                    id="kode"
                                                    name="kode"
                                                    placeholder="Kode Barang"
                                                    class="form-control"
                                                    value="{{ old('kode') ? old('kode'):$barang->kode }}"
                                                    required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Barang</label>
                                    <div class="col-xl-9">
                                        <select name="produk_master_id" id="produkBarang" class="form-control" style="width: 100%; height: 50%;" required>
                                                @foreach($produk as $data)
                                                    <option {{ $data->id == $barang->produk_master_id ? 'selected':''  }} value="{{ $data->id }}">{{ $data->nama }} - <b>{{ $data->suplier->nama }}</b></option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="row form-group">
                                        <label class="col-xl-3 ">Ukuran</label>
                                        <div class="col col-md-6">
                                            <div class="input-group">
                                                <input type="number"
                                                       step="any"
                                                       id="ukuran"
                                                       name="ukuran"
                                                       placeholder="Contoh: 0.099"
                                                       class="form-control"
                                                       min="0"
                                                       value="{{ old('ukuran') ? old('ukuran'):$barang->ukuran }}"
                                                       require>
                                           </div>
                                        </div>
                                        <div class="col col-md-3">
                                            <div class="input-group">
                                                <select name="satuan_ukuran_id" class="form-control" required>
                                                    <option value="">Pilih Satuan</option>
                                                        @foreach($satuan_ukuran as $data)
                                                            <option {{ $data->id == $barang->satuan_ukuran_id ? 'selected':'' }} value="{{ $data->id }}">{{ $data->nama }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 ">Jumlah Total</label>
                                    <div class="col-xl-9">
                                        <div class="input-group">
                                            <input  type="number"
                                                    id="jumlah_total"
                                                    name="jumlah_total"
                                                    placeholder="jumlah total"
                                                    class="form-control"
                                                    value="{{ old('jumlah_total') ? old('jumlah_total'):$barang->jumlah_total }}"
                                                    required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 ">Jumlah Minimal</label>
                                    <div class="col-xl-9">
                                        <div class="input-group">
                                            <input  type="number"
                                                    id="jumlah_min"
                                                    name="jumlah_min"
                                                    placeholder="jumlah Minimal"
                                                    class="form-control"
                                                    value="{{ old('jumlah_min') ? old('jumlah_min'):$barang->jumlah_min }}"
                                                    required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 ">Jenis Barang</label>
                                    <div class="col-xl-9">
                                        <select name="jenis_barang" class="custom-select  @error('jenis_barang') is-invalid @enderror">{{ old('jenis_barang') }}>
                                        <option value="bahan_baku" @if(old('jenis_barang', $barang->jenis_barang) == "Bahan Baku") selected @endif>Bahan Baku</option>
                                        <option value="bahan_setengah_jadi" @if(old('jenis_barang', $barang->jenis_barang) == "Bahan Setengah Jadi") selected @endif>Bahan Setengah Jadi</option>
                                        <option value="bahan_jadi" @if(old('jenis_barang', $barang->jenis_barang) == "Bahan Jadi") selected @endif>Bahan Jadi</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 ">Status Barang</label>
                                    <div class="col-xl-9">
                                        <select name="is_status" class="form-control" value="{{ old('is_status') }}">
                                            <option value="1" @if(old('is_status', $barang->is_status) == "1") selected @endif >Tidak Tersedia</option>
                                            <option value="0" @if(old('is_status', $barang->is_status) == "0") selected @endif >Tersedia</option>
                                        </select>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('barang.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">

        $('#produkBarang').select2({
            theme:'bootstrap4',
        })

    </script>
@endpush
