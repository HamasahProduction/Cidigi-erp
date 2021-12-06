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
                        <div class="card-header">Tambah Formula Utama</div>
                        <div class="card-body card-block">
                            <form action="{{route('formula-utama.store')}}" method="post" class="">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Nama Formula</label>
                                    <div class="col-xl-9">
                                        <select name="formula_id" class="form-control" id="pilihFormula" required>
                                            <option value="">Pilih Formula</option>
                                                @foreach($formula as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Formula Item</label>
                                    <div class="col-xl-9">
                                        <select name="subitem_id" id="subitem" class="form-control" required>
                                            <option value="">Pilih Formula Item</option>
                                                @foreach($dataSubitem as $data)
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
                                                <input  type="number"
                                                        name="harga_formula_utama"
                                                        value="{{old('harga formula utama')}}"
                                                        placeholder="masukan harga formula utama"
                                                        class="form-control @error('harga_formula_utama') is -invalid @enderror"
                                                        required
                                                        min="0"
                                                        />
                                                        @if ($errors->has('harga_formula_utama'))
                                                            <span class="invalid-feedback">
                                                                {{$errors->first('harga_formula_utama')}}
                                                            </span>
                                                        @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('formula-utama.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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

    $('#subitem').select2({
        theme:'bootstrap4',
        'placeholder':'Pilih Formula Item'
    });

    $('#pilihFormula').select2({
        theme:'bootstrap4',
        'placeholder':'Pilih Formula'
    })
</script>

@endpush
