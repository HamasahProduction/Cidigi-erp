@extends('dashboard')

@section('content')
     <div class="content">
        <div class="col-md-10 offset-md-2">
         <div class="animated fadeIn">
             <div class="row">
                 <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">Tambah Formula</div>
                        <div class="card-body card-block">
                            <form action="{{route('formula.store')}}" method="post" class="">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-xl-3 ">Nama formula</label>
                                    <div class="col-xl-9">
                                        <div class="input-group">
                                            <input  type="text"
                                                    id="nama"
                                                    name="nama"
                                                    placeholder="Nama formula"
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
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 ">Status Barang</label>
                                    <div class="col-xl-9">
                                        <select required name="status" class="custom-select @error('status') is-invalid @enderror">{{ old('status') }}>
                                            <option value="">Pilih Status</option>
                                            <option value="utama">Formula Utama</option>
                                            <option value="item">Formula Item</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('formula.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
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
@section('scripts')
@endsection
