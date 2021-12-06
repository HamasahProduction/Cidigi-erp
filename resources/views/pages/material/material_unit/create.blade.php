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
                            <form action="{{route('material-unit.store')}}" method="post" class="">
                                @csrf

                               

                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Material</label>
                                    <div class="col-xl-9">
                                        <select name="material_id" id="material" class="form-control" style="width: 100%; height: 50%;" required>
                                            <option value="" >Pilih Barang</option>
                                                @foreach($material as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</b></option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Unit Komponen</label>
                                    <div class="col-xl-9">
                                        <select name="unit[]" id="unit" class="form-control" multiple="multiple" style="width: 100%; height: 50%;" required>
                                            <option value="" >Pilih Barang</option>
                                                @foreach($unit as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama_unit }}</b></option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="row form-group">
                                        <label class="col-xl-3 ">Biaya</label>
                                        <div class="col col-md-4">
                                            <div class="input-group">
                                                <input type="number"
                                                       step="any"
                                                       id="biaya"
                                                       name="biaya"
                                                       class="form-control"
                                                       min="0"
                                                       require>
                                           </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="card-block">
                                    <div class="row form-group">
                                            <label class="col-xl-3 ">Jumlah</label>
                                            <div class="col col-md-4">
                                                <div class="input-group">
                                                    <input type="number"
                                                        step="any"
                                                        id="qty"
                                                        name="qty"
                                                        class="form-control"
                                                        min="0"
                                                        require>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                                 
                           
                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('material-unit.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">

        $('#material').select2({
            theme:'bootstrap4',
            'placeholder':'pilih Material'
        });
        $('#unit').select2({
            theme:'bootstrap4',
            'placeholder':'pilih unit material'
        })

    </script>
@endpush
