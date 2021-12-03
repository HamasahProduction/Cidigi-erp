@extends('dashboard')

@section('content')
     <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Tambah Ukuran</div>
                        <div class="card-body card-block">
                            <form class="form-horizontal" action="{{ route('satuan-ukuran.store') }}" method="post" >
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text"
                                                name="nama"
                                                value="{{old('satuan ukuran')}}"
                                                placeholder="maksimal 2 karakter"
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
                                <div class="form-actions form-group">
                                    <button type="submit" class="btn btn-success btn-sm pull-right">Tambah</button>
                                    <a href="{{route('satuan-ukuran.index')}}" class="btn btn-sm btn-primary-outline pull-right">kembali</a>
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
