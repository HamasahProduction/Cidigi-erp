@extends('dashboard')
@push('more-css')
      <link rel="stylesheet" type="text/css" href="{{ asset('template/assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Katalog</strong><br>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($katalog as $row)
                            <div class="col-md-3">
                                <a href="#" class="card-link">
                                    <div class="text-center card card-body pl-1 pr-1">
                                    <img src="template/images/no_img.png" class="rounded mb-4">
                                        <span>{{$row->masterproduk->nama}}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            <div class="col-lg-12 col-xs-12">
                                {{ $katalog->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection