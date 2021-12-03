@extends('dashboard')

@section('content')
     <div class="content">
        <div class="col-md-10 offset-md-2">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Edit Formula Item</div>
                        <div class="card-body card-block">
                            <form action="{{route('formula-item.update', $formula_item->id)}}" method="post" class="">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input  type="text"
                                                id="nama"
                                                name="nama"
                                                placeholder="nama formula item"
                                                class="form-control"
                                                value="{{ old('nama') ? old('nama'):$formula_item->nama }}"
                                        >
                                    </div>
                                </div>
                                <div class="form-actions form-group pull-right">
                                    <a href="{{route('formula-item.index')}}" class="btn btn-sm btn-primary-outline">kembali</a>
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
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
