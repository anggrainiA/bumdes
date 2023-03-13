@extends('app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Master Data</a></li>
                            <li><a href="{{ route('get.pemasok') }}">Pemasok</a></li>
                            <li class="active">Daftar Barang</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Daftar Barang</h3>

                        </div>

                        <div class="panel-body">
                            <div class="row mt-2">

                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="container">
                                        <div class="col-sm-6 col-xs-12">
                                            <div class="m-t-5">
                                                <form class="form" role="form">
                                                
                                                            <div class="form-group">
                                                                <label class="control-label">Total Jenis Barang</label>
                                                                <div class="">
                                                                    <input type="text" class="form-control"
                                                                        disabled="disabled" value="{{ 1 }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label">Nama Pemasok</label>
                                                                <div class="">
                                                                    <input type="text" class="form-control"
                                                                        disabled="disabled" value="{{ $pemasok[$loc]['nama']}}">
                                                                </div>
                                                            </div>

                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <div class="m-t-5">
                                                    <form class="form" role="form">
                                                        <div class="form-group">
                                                            <label class="control-label">Nomor Telepon</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" disabled="disabled"
                                                                    value="{{ $pemasok[$loc]['nohp']}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Alamat Pemasok</label>
                                                            <div class="">
                                                                <input type="text" class="form-control" disabled="disabled"
                                                                    value="{{ $pemasok[$loc]['alamat']}}">
                                                            </div>
                                                        </div>
                                                        
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>

                                    <button class="btn btn-primary mb-2 pb-2" style="margin-bottom: 25px"
                                        data-toggle="modal" data-target="#tambah"> Tambah Barang </button>
                                    <table id="datatable-responsive"
                                        class="table table-hover table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th style="text-align: center;">Kode Barang</th>
                                                <th style="text-align: center;">Nama Barang</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @isset($data[$loc]['detil'])
                                                @foreach ($data[$loc]['detil'] as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="conbtn">
                                                                {{ $loop->index + 1 }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ 11011011 }}
                                                            {{-- Kode ni, harus dibahas --}}
                                                        </td>
                                                        <td>
                                                            {{ $data == null ? 'kosong' : $item['nama'] }}
                                                        </td>
                                                        <td>
                                                            <div class="conbtn">
                                                                <button class="btn btn-primary center fa fa-edit"
                                                                    data-toggle="modal" data-target="#edit" onclick='edit_data(@json($item),{{$loop->index}})'></button>
                                                                <button class="btn btn-danger center fa fa-trash"
                                                                    style="margin-left: 2%"></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Row -->


        </div> <!-- container -->

    </div> <!-- content -->

    <!-- sample modal content -->
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Barang</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('post.detilpemasok') }}" class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-8">
                                <input name="nama" type="text" class="form-control" placeholder="Nama Barang"
                                    required>
                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-default waves-effect m-l-5"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Modal Edit (1)-->
    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Data Barang</h4>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('post.editdetilpemasok') }}">
                        @csrf
                        <input type="hidden" id="edit_id" name="id">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-8">
                                <input name="nama" type="text" class="form-control" id="edit_nama"
                                    placeholder="Nama Barang" required>
                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-default waves-effect m-l-5"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        </div>
                    </form>

                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
    <script>

        function edit_data(data,id) {
            console.log('editdata: ' + data['nama']);
            document.getElementById("edit_id").value = id;
            document.getElementById("edit_nama").value = data['nama'];
        }
    </script>
@endsection