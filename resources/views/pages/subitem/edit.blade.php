@extends('dashboard')

@section('content')
     <div class="content">
        <div class="col-md-10 offset-md-2">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">Tambah Barang</div>
                        <div class="card-body card-block">
                            <form action="{{route('subitem.update', $subitem->id)}}" method="post" class="">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-xl-3 ">Nama Subitem</label>
                                    <div class="col-xl-9">
                                        <div class="input-group">
                                            <input  type="text" 
                                                    id="nama" 
                                                    name="nama" 
                                                    placeholder="nama subitem" 
                                                    class="form-control"
                                                    value="{{ old('nama') ? old('nama'):$subitem->nama }}"
                                                    required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('subitem.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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
@section('scripts')
@endsection
