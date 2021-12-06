@extends('dashboard')

@section('content')
     <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Tambah Divisi</div>
                        <div class="card-body card-block">
                            <form action="{{route('divisi.store')}}" method="post" class="">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text"
                                                id="nama"
                                                name="nama"
                                                placeholder="nama divisi"
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
                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('divisi.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
                                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
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
