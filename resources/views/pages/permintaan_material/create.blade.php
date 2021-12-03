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
                            <form action="{{route('permintaan-material.store')}}" method="post" class="">
                                @csrf

                                 <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Jenis Permintaan</label>
                                    <div class="col-xl-9">
                                        <select name="jenis_permintaan" class="form-control" id="jenisPermintaan" required>
                                            <option value="">Pilih Formula</option>
                                            <option value="utama">Pilih Utama</option>
                                            <option value="item">Pilih Item</option>
                                            <option value="barang">Pilih Barang</option>
                                                
                                        </select>
                                    </div>
                                </div>

                                 <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Formula Utama</label>
                                    <div class="col-xl-9">
                                        <select name="formula_utama_id" class="form-control" id="pilihFormulaUtama" required>
                                            <option value="">Pilih Formula</option>
                                                @foreach($formula_utama as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Formula Item</label>
                                    <div class="col-xl-9">
                                        <select name="formula_item_id" class="form-control" id="pilihFormulaItem" required>
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
                                        <select name="barang_id" id="barang" class="form-control" required>
                                            <option value="">Pilih Barang</option>
                                                @foreach($barang as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                 <div class="card-block">
                                    <div class="row form-group">
                                        <label class="col-xl-3 ">Pemohon</label>
                                        <div class="col col-md-6">
                                            <div class="input-group">
                                                <input type="text"
                                                       step="any"
                                                       id="nama"
                                                       name="nama"
                                                       placeholder="Ahmad"
                                                       class="form-control"
                                                       require>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row form-group">
                                        <label class="col-xl-3 ">Tanggal Permintaan</label>
                                        <div class="col col-md-6">
                                            <div class="input-group">
                                                <input type="date"
                                                    id="tanggal_permintaan"
                                                    name="tanggal_permintaan"
                                                    class="form-control"
                                                    require>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                        <div class="row form-group">
                                            <label class="col-xl-3 ">Kebutuhan Item</label>
                                            <div class="col col-md-6">
                                                <div class="input-group">
                                                    <input type="number"
                                                        step="any"
                                                        id="kebutuhan_permintaan"
                                                        name="kebutuhan_permintaan"
                                                        placeholder="Contoh: 100"
                                                        class="form-control"
                                                        min="0"
                                                        require>
                                            </div>
                                            </div>
                                        </div>
                                    </div>


                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('permintaan-material.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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

$(document).ready(function(e) {
    // var utama = $this.val()
    $('#jenisPermintaan').change(function(e) {
        $('#jenisPermintaan').removeAttr('disabled');

        $('#pilihFormulaUtama').removeAttr('disabled').select2({
            theme:'bootstrap4',
            'placeholder':'Pilih Formula Utama'
        });
        
        $('#pilihFormulaItem').removeAttr('disabled').select2({
            theme:'bootstrap4',
            'placeholder':'Pilih Formula Item'
        });
        
        $('#barang').removeAttr('disabled').select2({
            theme:'bootstrap4',
            'placeholder':'Pilih Barang'
        });

       

        if ($('#jenisPermintaan').val()=="utama"){

            $('#pilihFormulaItem').attr('disabled','disabled');
            $('#barang').attr('disabled','disabled');
            
        }
        
        else if($('#jenisPermintaan').val()=="item"){

            $('#barang').attr('disabled','disabled');
            $('#pilihFormulaUtama').attr('disabled', 'disabled');
        }
        
        else if($('#jenisPermintaan').val()=="barang"){
             
            $('#pilihFormulaUtama').attr('disabled', 'disabled');
            $('#pilihFormulaItem').attr('disabled', 'disabled');
        }
            
        else{
             $('#jenisPermintaan').removeAttr('disabled');
        }
       
    });
});

</script>

@endpush
