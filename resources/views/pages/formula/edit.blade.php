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
                            <form action="{{route('formula.update', $formula->id)}}" method="post" class="">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-xl-3 ">Nama formula</label>
                                    <div class="col-xl-9">
                                        <div class="input-group">
                                            <input  type="text"
                                                    id="nama"
                                                    name="nama"
                                                    placeholder="nama formula"
                                                    class="form-control"
                                                    value="{{ old('nama') ? old('nama'):$formula->nama }}"
                                                    required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-xl-3 ">Jenis Formula</label>
                                    <div class="col-xl-9">
                                        <select name="status" class="custom-select  @error('status') is-invalid @enderror">{{ old('status') }}>
                                        <option value="utama" @if(old('status', $formula->status) == "Formula Utama") selected @endif>Formula Utama</option>
                                        <option value="item" @if(old('status', $formula->status) == "Formula Item") selected @endif>Formula Item</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('formula.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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
