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
                        <strong class="card-title">
                            <a href="javascript:;" v-if="showform" @click="cancel()"><i class="fa fa-arrow-left"></i>&nbsp; </a>
                            Tabel Order
                            <div v-if="btnadd" class="pull-right">
                                <button @click="addNew()" class="btn btn-outline-secondary"><i class="fa fa-plus"></i></button>
                            </div>
                        </strong>
                    </div>
                    <div class="card-body appvue">
                        <div class="table-responsive pb-3" :style="(!showform) ? '':'display:none'">
                            <table id="dataTable" class="align-middle pb-3 table table-striped table-hover display responsive w-100">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Invoice</th>
                                        <th>Nama&nbsp;Pelanggan</th>
                                        <th>Sales&nbsp;Name</th>
                                        <th>Total</th>
                                        <th>Modif</th>
                                        <th style="width:80px">Actions&nbsp;</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div :style="(showform) ? '':'display:none'">
                            <div class="offset-md-3 col-md-6 col-xs-12">
                                <h3 class="mt-3">@{{labl}}</h3>
                                <div class="position-relative row form-group">
                                    <label for="a1" :class="'col-sm-4 col-form-label' + ((sw<720) ? '': ' text-right')">modul</label>
                                    <div class="col-sm-8">
                                        <input id="a1" type="text" class="form-control" v-model="modul">
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="a2" :class="'col-sm-4 col-form-label' + ((sw<720) ? '': ' text-right')">Nama Status</label>
                                    <div class="col-sm-8">
                                        <input id="a2" type="text" class="form-control" v-model="name">
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="a3" :class="'col-sm-4 col-form-label' + ((sw<720) ? '': ' text-right')">Key</label>
                                    <div class="col-sm-8">
                                        <input id="a3" type="text" class="form-control" v-model="key">
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="a4" :class="'col-sm-4 col-form-label' + ((sw<720) ? '': ' text-right')">Background Color</label>
                                    <div class="col-sm-8">
                                        <input id="a4" type="text" class="form-control" v-model="bg">
                                    </div>
                                </div>
                                <div class="position-relative row form-group">
                                    <label for="a5" :class="'col-sm-4 col-form-label' + ((sw<720) ? '': ' text-right')">Font Color</label>
                                    <div class="col-sm-8">
                                        <input id="a5" type="text" class="form-control" v-model="font">
                                    </div>
                                </div>

                                <div class="mb-5 mt-2 progress" :style="(loading)?'min-width:100% !important':'display:none'">
                                    <div class="progress-bar progress-bar-animated bg-primary progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                </div>

                                <div class="offset-sm-4 col-sm-8 mt-3" :style="(!loading)?'':'display:none'">
                                    <button @click="cancel()" class="btn btn-outline-secondary float-left mb-5">
                                        <i class="fa fa-times"></i> BATAL
                                    </button>
                                    <input type="hidden" v-model="uuidedit">
                                    <button @click="save()" class="btn btn-outline-primary float-right mb-5">
                                        <i class="fa fa-check"></i> SIMPAN
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection