@extends('dashboard')

@section('content')
     <div class="content">
        <div class="col-md-10 offset-md-2">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Tambah Formula</div>
                        <div class="card-body card-block">
                            <form class="form-horizontal" action="{{ route('formula-item.store') }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text"
                                                name="nama"
                                                value="{{old('satuan ukuran')}}"
                                                placeholder="masukan nama formula item"
                                                class="form-control @error('nama') is -invalid @enderror"
                                                required
                                                />
                                               @if ($errors->has('nama'))
                                                   <span class="invalid-feedback">
                                                       {{$errors->first('nama')}}
                                                   </span>
                                               @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input  type="number"
                                                name="harga_peritem"
                                                value="{{old('satuan ukuran')}}"
                                                placeholder="masukan harga peritem formula item"
                                                class="form-control @error('harga_peritem') is -invalid @enderror"
                                                required
                                                min="0"
                                                />
                                               @if ($errors->has('harga_peritem'))
                                                   <span class="invalid-feedback">
                                                       {{$errors->first('harga_peritem')}}
                                                   </span>
                                               @endif
                                    </div>
                                </div>
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm pull-right">Tambah</button>
                                    <a href="{{route('formula-item.index')}}" class="btn btn-sm btn-primary-outline pull-right">kembali</a>
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

@endpush
