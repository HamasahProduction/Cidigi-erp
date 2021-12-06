@extends('dashboard')

@section('content')
     <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Edit Satuan Ukuran</div>
                        <div class="card-body card-block">
                            <form action="{{route('satuan-ukuran.update', $ukuran->id)}}" method="post" class="">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text"
                                                id="nama"
                                                name="nama"
                                                placeholder="nama satuan ukuran"
                                                class="form-control"
                                                value="{{ old('nama') ? old('nama'):$ukuran->nama }}"
                                        >
                                    </div>
                                </div>
                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('satuan-ukuran.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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
