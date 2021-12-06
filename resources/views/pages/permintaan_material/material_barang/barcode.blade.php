<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cetak Permintaan Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <style>
    .height {
        min-height: 200px;
    }

    .icon {
        font-size: 47px;
        color: #5CB85C;
    }

    .iconbig {
        font-size: 77px;
        color: #5CB85C;
    }

    .table > tbody > tr > .emptyrow {
        border-top: none;
    }

    .table > thead > tr > .emptyrow {
        border-bottom: none;
    }

    .table > tbody > tr > .highrow {
        border-top: 3px solid;
    }
</style>
    
</head>
<body>

<div class="container">
<table class="pull-right">
    <tr >
    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($data->no_permintaan, 'C39') }}" 
        alt="{{ $data->no_permintaan }}"
        width="160"
        height="40">
    
</tr>
</table>
<br>
<br>
<br>
<br>
<div class="page-header">
    <h1>Permintaan Barang <br> 
        <small>{{$data->barang->nama}}</small>
    </h1>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2>No Permintaan  {{$data->no_permintaan}}</h2>
            </div>
            <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Nama Barang</strong></td>
                                    <td class="text-center"><strong>Ukuran</strong></td>
                                    <td class="text-center"><strong>Jumlah Permintaan</strong></td>
                                    <td class="text-center"><strong>Tanggal Permintaan</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$data->barang->nama}}</td>
                                    <td class="text-center">{{$data->ukuran}} {{$data->satuanUkuran->nama}}</td>
                                    <td class="text-center">{{$data->jumlah_permintaan}}</td>
                                    <td class="text-center">{{$data->tgl_permintaan}}</td>
                                    <td class="text-right">$900</td>
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
