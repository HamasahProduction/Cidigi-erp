@extends('dashboard')

@section('content')
     <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Edit Unit</div>
                        <div class="card-body card-block">
                            <form action="{{route('unit.update', $unit->id)}}" method="post" class="">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text"
                                                id="nama_unit"
                                                name="nama_unit"
                                                placeholder="nama_unit"
                                                class="form-control"
                                                value="{{ old('nama_unit') ? old('nama_unit'):$unit->nama_unit }}"
                                        >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text"
                                                id="harga"
                                                name="harga"
                                                placeholder="harga"
                                                class="form-control"
                                                value="{{ old('harga') ? old('harga'):$unit->harga }}"
                                        >
                                    </div>
                                </div>
                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('unit.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
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

@endpush
