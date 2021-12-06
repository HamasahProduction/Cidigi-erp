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
                        <strong class="card-title">Data Divisi</strong><br>
                       <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#mediumModal">
                          Tambah Data
                      </button>
                    </div>
                    <div class="card-body">
                        @if( session('msg') )
                            <?php $msg = session('msg'); ?>
                                <div class="alert alert-{{ $msg['type'] }} alert-remove">
                                    {!! $msg['text'] !!}
                                </div>
                        @endif
                        <table id="datatable" class="table table-bordered table-striped table-hover" style="width: 100%;">
                            <thead class="text-primary">
                                <tr>
                                <th >NO</th>
                                <th >Nama Divisi</th>
                                <th >AKSI</th>
                                </tr>
                            </thead>
                           
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"> Tutup &times;</span>
                </button>
            </div>
            <div class="modal-body">
               @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Divisi</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Divisi">
                    <input type="hidden" id="id" name="id">
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" id="tutup" class="btn btn-secondary " data-bs-dismiss="modal">Close</button> -->
                <button type="button" id="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>


@endsection

@push('more-js')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/sweetalert.min.js') }}"></script>

    <script type="text/javascript">
    $(document).ready(function () {
            isi()
        })
        function isi() {
            $('#datatable').DataTable({
                serverside : true,
                responseive : true,
                ajax : {
                    url : "{{route('divisi.index')}}"
                },
                columns:[
                        {
                            "data" :null, "sortable": false,
                            render : function (data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1
                            }
                        },
                        {data: 'nama', name: 'nama'},
                        {data: 'aksi', name: 'aksi'}
                    ]
            })
        }
    </script>
    <script>
        $('#simpan').on('click',function () {
            if ($(this).text() === 'Simpan Edit') {
                // console.log('Edit');
            edit()
            } else {
            tambah()
            }
        })
        
        $(document).on('click','.edit', function () {
            let id = $(this).attr('id')
            $('#tambah').click()
            $('#simpan').text('Simpan Edit')
            $.ajax({
                url : "{{route('divisi.edit')}}",
                type : 'post',
                data : {
                    id : id,
                    _token : "{{csrf_token()}}"
                },
                success: function (res) {
                    $('#id').val(res.data.id)
                    $('#nama').val(res.data.nama)
                }
            })
        })
        /**
         * Tambah Data
         * @date 2021-05-05
         * @returns {any}
         */
        function tambah() {
            $.ajax({
                    url : "{{route('divisi.store')}}",
                    type : "post",
                    data : {
                        nama : $('#nama').val(),
                        "_token" : "{{csrf_token()}}"
                    },
                    // success : function (res) {
                    //     console.log(res);
                    //     alert(res.text)
                        // $('#tutup').click()
                        // $('#datatable').DataTable().ajax.reload()
                        // $('#nama').val(null)
                    // },
                    success: function (res) {
                        swal("Success!", "berhasil menambahkan data divisi!", "success"),
                        $('#tutup').click()
                        $('#datatable').DataTable().ajax.reload()
                        $('#nama').val(null)
                        
                    },

                    error : function (xhr) {
                        alert(xhr.responJson.text)
                    }
                })
        }
        /**
         * 描述
         * @date 2021-05-05
         * @returns {any}
         */
        function edit() {
            $.ajax({
                    url : "{{route('divisi.update')}}",
                    type : "post",
                    data : {
                        id : $('#id').val(),
                        nama : $('#nama').val(),
                        "_token" : "{{csrf_token()}}"
                    },
                    success : function (res) {
                        console.log(res);
                        alert(res.text)
                        $('#tutup').click()
                        $('#datatable').DataTable().ajax.reload()
                        $('#nama').val(null)
                        $('#simpan').text('Simpan')
                    },
                    error : function (xhr) {
                        alert(xhr.responJson.text)
                    }
                }) 
        }
        $(document).on('click','.hapus', function () {
            let id = $(this).attr('id')
            $.ajax({
                url : "{{route('divisi.hapus')}}",
                type : 'post',
                data: {
                    id: id,
                    "_token" : "{{csrf_token()}}"
                },
                success: function (params) {
                    alert(params.text)
                    $('#datatable').DataTable().ajax.reload()
                }
            })
        })
</script>
@endpush
