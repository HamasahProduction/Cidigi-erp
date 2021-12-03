@extends('dashboard')

@section('content')
     <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Edit suplier</div>
                        <div class="card-body card-block">
                            <form action="{{route('suplier.update', $suplier->id)}}" method="post" class="">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text" 
                                                id="nama" 
                                                name="nama" 
                                                placeholder="nama suplier" 
                                                class="form-control"
                                                value="{{ old('nama') ? old('nama'):$suplier->nama }}"
                                        >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text" 
                                                id="alamat" 
                                                name="alamat" 
                                                placeholder="alamat suplier" 
                                                class="form-control"
                                                value="{{ old('alamat') ? old('alamat'):$suplier->alamat }}"
                                        >
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text" 
                                                id="kontak" 
                                                name="kontak" 
                                                placeholder="kontak suplier" 
                                                class="form-control"
                                                value="{{ old('kontak') ? old('kontak'):$suplier->kontak }}"
                                        >
                                    </div>
                                </div>
                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('suplier.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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