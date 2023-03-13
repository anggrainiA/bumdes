@extends('app')

@section('content')
<div class="content">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-title">
                    <h4 class="pull-left page-title">Persediaan Barang</h4>
                    {{-- <ol class="breadcrumb pull-right">
                        <li class="active">Dashboard</li>
                    </ol> --}}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            @isset($alert)
            <div class="alert alert-danger fade in">
                <h4>Stok Barang </h4>
                <p>Stok barang hampir habis</p>
                <ul>
                    <li>
                        Gas
                    </li>
                    <li>
                        Minyak
                    </li>
                </ul>
                <p class="flex justify-content-right">
                  <button type="button" onclick="window.location.href='{{ route('get.pembelian') }}'" class="btn btn-sm btn-danger waves-effect waves-light" style="border-radius: 10px">Beli</button>
                </p>
            </div>
            @endisset
            
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Persediaan Barang</h3>

                    </div>

                    <div class="panel-body">
                        <div class="row mt-2">
                            {{-- <button class="btn btn-primary mb-2 pb-2" style="margin-bottom: 25px" data-toggle="modal" data-target="#tambah"> Tambah pengelola </button> --}}
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable-responsive" class="table table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; vertical-align: middle;">No</th>
                                            <th style="text-align: center; vertical-align: middle;">Nama Barang</th>
                                            <th style="text-align: center; vertical-align: middle;">Jumlah<br>Barang</th>
                                            <th style="text-align: center; vertical-align: middle;">Persediaan<br>Minimum</th>
                                            <th style="text-align: center; vertical-align: middle;">Status Barang</th>
                                            <th style="text-align: center; vertical-align: middle;">Harga Jual</th>
                                            <th style="text-align: center; vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($barang as $item) 
                                        <tr>
                                            <td>
                                                <div class="conbtn">
                                                    {{ $loop->index+1 }}
                                                </div>
                                            </td>
                                            <td>
                                                {{$item['nama']}}
                                            </td>
                                            <td>
                                                {{$item['jumlah']}}
                                            </td>
                                            <td>
                                                {{$item['minimum']}}
                                            </td>
                                            <td>
                                                {{$item['status']}}
                                            </td>
                                            <td>
                                                {{$item['jual']}}
                                            </td>
                                            <td>
                                                <div class="conbtn">
                                                    <button class="btn btn-primary center fa fa-edit" data-toggle="modal" data-target="#edit" onclick="edit({{$loop->index}})"></button>
                                                    <button class="btn btn-danger center fa fa-trash" style="margin-left: 2%"></button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

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
<div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Stok Barang</h4>
            </div>
            <div class="modal-body">
                <form method="POST" action="/stok" class="form-horizontal" role="form">
                    @csrf
                    <input type="hidden" name="edit" id="val">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Persediaan Minimum</label>
                        <div class="col-md-8">
                            <input name="minimum" data-parsley-type="number" type="text" class="form-control" placeholder="Jumlah Minimum Ketersediaan Barang" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Nominal Untung</label>
                        <div class="col-md-8">
                            <input name="untung" data-parsley-type="number" type="text" class="form-control" placeholder="Untung dari Penjualan Barang (Rp)" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">Status Barang</label>
                        <div class="col-sm-8">
                            <select name="status" class="form-control" required>
                                <option value="Barang Dagangan">Barang Dagangan</option>
                                <option value="Perlengkapan Usaha">Perlengkapan Usaha</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default waves-effect m-l-5" data-dismiss="modal">Cancel</button>
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
    function edit(id) {
        console.log('edit: '+id);
        document.getElementById("val").value = id;
    }
</script>
@endsection