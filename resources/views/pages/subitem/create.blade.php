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
                        <div class="card-header">Tambah Formula</div>
                        <div class="card-body card-block">
                            <form action="{{route('subitem.store')}}" method="post" class="">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Nama Formula</label>
                                    <div class="col-xl-9">
                                        <select name="formula_item_id" class="form-control" id="pilihFormula" required>
                                            <option value="">Pilih Formula</option>
                                                @foreach($formula_item as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Barang</label>
                                    <div class="col-xl-9">
                                        <select name="barang_id[]" id="barang" class="form-control" required multiple="multiple">
                                            <option value="">Pilih Barang</option>
                                                @foreach($barang_item as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                               <div class="card-block">
                                    <div class="row form-group">
                                        <label class="col-xl-3 ">Jumlah</label>
                                        <div class="col col-md-6">
                                            <div class="input-group">
                                                <input type="number"
                                                       step="any"
                                                       id="jumlah"
                                                       name="jumlah"
                                                       placeholder="Contoh: 100"
                                                       class="form-control"
                                                       min="0"
                                                       require>
                                           </div>
                                        </div>
                                        <div class="col col-md-3">
                                            <div class="input-group">

                                                <div class="input-group-prepend">
                                                    {{-- <span class="input-group-text"  id="jumlahBarangSelected"></span> --}}
                                                </div>
                                                {{-- <input type="number"
                                                        step="any"
                                                        name="jumlah_total"
                                                        class="form-control"
                                                        min="0"
                                                        disabled
                                                        require> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('subitem.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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

<script src="{{ asset('template/assets/js/sweetalert.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

    $('#barang').select2({
        theme:'bootstrap4',
        'placeholder':'Pilih Barang'
    });

    $('#pilihFormula').select2({
        theme:'bootstrap4',
        'placeholder':'Pilih Formula'
    })
</script>

@endpush
