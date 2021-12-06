@extends('dashboard')
@push('more-css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@endpush
@section('content')
     <div class="content">
        <div class="col-md-10 offset-md-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Tambah Produk</div>
                        <div class="card-body card-block">
                            <form action="{{route('master-produk.store')}}" method="post" class="">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Nama Produk</label>
                                    <div class="col-xl-9">
                                        <input  type="text"
                                                id="nama"
                                                name="nama"
                                                placeholder="nama produk"
                                                class="form-control"
                                                required
                                                />
                                            @if ($errors->has('nama'))
                                                <span class="invalid-feedback">
                                                    {{$errors->first('nama')}}
                                                </span>
                                            @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-form-label">Suplier</label>
                                    <div class="col-xl-9">
                                        <select name="suplier_id" id="suplier" class="form-control" required>
                                            <option value="">Pilih suplier</option>
                                                @foreach($suplier as $data)
                                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('master-produk.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
                                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection

@push('more-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

    $('#suplier').select2({
        theme:'bootstrap4',
        'placeholder':'Pilih Suplier'
    });
</script>
@endpush
