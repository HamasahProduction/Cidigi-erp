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
                        <strong class="card-title">Penawaran</strong><br>
                    </div>
                    <div class="card-body">
                        <div id="ac" class="accordion-wrapper mb-3">
                            @php 
                                $first = 'true';
                            @endphp
                            @foreach($penawaran as $row)
                                <div class="card">
                                    <div id="h{{$row->id}}e" class="card-header">
                                        <button type="button" data-toggle="collapse" data-target="#collapse{{$row->id}}" aria-expanded="{{$first}}" aria-controls="collapse{{$row->id}}" class="text-left m-0 p-0 btn btn-link btn-block">
                                            <h5 class="m-0 p-0">#{{$row->kode}} - {{$row->nama}}</h5>
                                        </button>
                                    </div>
                                    <div data-parent="#ac" id="collapse{{$row->id}}" aria-labelledby="h{{$row->id}}e" class="collapse{{($first=='true'?' show':'')}}">
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Nama&nbsp;Barang</th>
                                                            <th>Spesifikasi</th>
                                                            <th class="text-right">Harga Basic</th>
                                                            <th class="text-right">Harga Penawaran</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @php
                                                        $n = 1;
                                                    @endphp
                                                    @foreach($row->pivotpenawaran as $row2)
                                                        <tr>
                                                            <td class="text-center text-muted">#{{$n++}}</td>
                                                            <td>{{$row2->masterproduk->nama}}</td>
                                                            <td>{{$row2->spesifikasi}}</td>
                                                            <td class="text-right">
                                                                0,00
                                                            </td>
                                                            <td class="text-right">
                                                                {{number_format($row2->harga_penawaran,0,",",".")}}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php 
                                    $first = 'false';
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection