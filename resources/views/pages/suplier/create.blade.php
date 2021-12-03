@extends('dashboard')
@section('content')
<div class="content">
    <div class="col-md-10 offset-md-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Tambah Formula</div>
                        <div class="card-body card-block">
                            <form action="{{route('suplier.store')}}" method="post" class="">
                                @csrf

                                <div class="card-block">
                                    <div class="row form-group">
                                        <label class="col-xl-3 ">Nama Suplier</label>
                                        <div class="col col-md-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    step="any"
                                                    id="nama"
                                                    name="nama"
                                                    placeholder="PT. ....."
                                                    class="form-control"
                                                    require>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-block">
                                    <div class="row form-group">
                                        <label class="col-xl-3 ">Alamat</label>
                                        <div class="col col-md-9">
                                            <div class="input-group">
                                                <input type="text"
                                                    step="any"
                                                    id="alamat"
                                                    name="alamat"
                                                    placeholder="Jl. Pramuka no 12 .."
                                                    class="form-control"
                                                    require>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="col-xl-3 ">Kontak</label>
                                    <div class="col col-md-9">
                                        <div class="input-group">
                                            <input type="number"
                                                step="any"
                                                id="kontak"
                                                name="kontak"
                                                placeholder="Contoh: 100"
                                                class="form-control"
                                                min="0"
                                                maxlength="12"
                                                require>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('suplier.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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
@endpush
