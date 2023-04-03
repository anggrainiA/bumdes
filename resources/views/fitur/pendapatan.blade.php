@extends('app')

@section('content')
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Pendapatan</h4>
                        {{-- <ol class="breadcrumb pull-right">
                        <li class="active">Dashboard</li>
                    </ol> --}}
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Transaksi Pendapatan Jasa</h3>

                        </div>

                        <div class="panel-body">
                            <div class="row mt-2">
                                <button class="btn btn-primary mb-2 pb-2" style="margin-bottom: 25px" data-toggle="modal"
                                    data-target="#tambah"> Tambah Transaksi </button>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table id="datatable-responsive"
                                        class="table table-hover table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">No</th>
                                                <th style="text-align: center;">Tanggal</th>
                                                <th style="text-align: center;">Kode Transaksi</th>
                                                <th style="text-align: center;">Nama Usaha</th>
                                                <th style="text-align: center;">Nama Pelanggan</th>
                                                <th style="text-align: center;">Total Penghasilan</th>
                                                <th style="text-align: center;">Gambar Bukti</th>
                                                <th style="text-align: center;">Aksi</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($transaksi as $item)
                                                <tr>
                                                    <td>
                                                        <div class="conbtn">
                                                            {{ $loop->index + 1 }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{ $item['tanggal'] }}
                                                    </td>
                                                    <td>
                                                        {{ $item['id'] }}
                                                        <!-- Perlu dibahas kodenya gmn -->
                                                    </td>
                                                    <td>
                                                        {{ $item['namausaha']}}
                                                    </td>
                                                    <td>
                                                        {{ $item['nama'] }}
                                                    </td>
                                                    <td>
                                                        {{200.000}}
                                                    </td>
                                                    <td>
                                                        <div class="conbtn">
                                                            <img src="images/{{ $item['file'] }}" alt=""
                                                                onclick="edit('images/{{ $item['file'] }}',{{ $loop->index }})"
                                                                data-toggle="modal" data-target="#gambar"
                                                                style="width: 30px; height: 30px;">
                                                        </div>

                                                        
                                                    </td>
                                                    <td>
                                                        <div class="conbtn">
                                                            <button class="btn btn-primary center fa fa-edit"
                                                                data-toggle="modal" data-target="#edit"
                                                                onclick="edit_data({{$item}},{{$usaha}},{{$transaksi}})"></button>
                                                            <!-- {{-- onclick="edit_data('{{ $item['tanggal'] }}', '{{ $jasa[$item['usaha']]['namajasa'] }}', '{{ $pelanggan[$item['pelanggan']]['nama'] }}', {{ $loop->index }})" --}} -->
                                                            <form action="{{route('deletetransaksijasa',['id'=>$item['id']])}}" id="#delete-post-form " method="POST">
                                                                @csrf
                                                                <button class="btn btn-danger center fa fa-trash delete-user"
                                                                    style="margin-left: 2%"></button>
                                                            </form>


                                                            <button class="btn btn-success center mdi mdi-eye"
                                                                style="margin-left: 2%"
                                                                onclick="window.location.href='{{route('detailtransaksijasa',['id'=>$item['id']])}}'">
                                                                Detail</button>
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
    <div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Transaksi</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('transaksijasatambah')}}" method="POST" class="form-horizontal" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tanggal</label>
                            <div class="col-md-8">
                                <div class="input-group ">
                                    <input name="tanggal" type="text" class="form-control" placeholder="mm/dd/yyyy"
                                        id="datepicker-autoclose" required>
                                    <span class="input-group-addon bg-custom b-0"><i
                                            class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Usaha</label>
                            <div class="col-sm-8">
                                <select name="usaha" class="form-control" >

                                    @foreach ($usaha as $u)
                                   <option value="{{$u->id}}">{{$u->namausaha}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Pelanggan</label>
                            <div class="col-sm-8">
                                <select name="pelanggan" class="form-control" >
                                   
                                    @foreach ($pelanggan as $p)
                                   <option value="{{$p->id}}">{{$p->nama}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Catatan Transaksi</label>
                            <div class="col-md-8">
                                <input name="catatan" type="text" class="form-control"
                                    placeholder="Catatan Transaksi (bisa saja kosong)">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Bukti Transaksi</label>
                            <div class="col-md-8">
                                <input class="form-control" name="file" type="file" id="file" onchange="validateFile()"  />
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

    <!-- sample modal content -->
    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Edit Transaksi Jasa</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('edittransaksijasa')}}" method="POST" class="form-horizontal"
                        role="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="edit_id" value="">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Tanggal</label>
                            <div class="col-md-8">
                                <div class="input-group ">
                                    <input name="tanggal" type="text" class="form-control" placeholder="mm/dd/yyyy"
                                        id="datepicker-autoclose2" required>
                                    <span class="input-group-addon bg-custom b-0"><i
                                            class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Usaha</label>
                            <div class="col-sm-8">
                                <select id="edit_usah" name="usaha" class="form-control" required>
                                    @foreach ($usaha as $u)
                                        <option value="{{ $u['namausaha'] }}" selected>{{ $u['namausaha'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Nama Pelanggan</label>
                            <div class="col-sm-8">
                                <select id="edit_pelang" name="pelanggan" class="form-control" required>
                                     @foreach ($pelanggan as $p)
                                        <option value="{{ $p['id'] }}" selected>{{ $p['nama'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Catatan Transaksi</label>
                            <div class="col-md-8">
                                <input id="edit_catat" name="catatan" type="text" class="form-control"
                                    placeholder="Catatan Transaksi (bisa saja kosong)">
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

    <!-- sample modal content -->
    <div id="gambar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Bukti Transaksi</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="form-horizontal" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="conbtn">
                            <img src="" alt="nota" id="gambar_src" style="width: 80%;">
                        </div>
                        <input type="hidden" id="gambar_id" name="id">
                        <div style="margin-top: 20px;">
                            <label class="control-label">Edit Bukti Transaksi</label>
                        </div>
                        <div class="modal-footer mt-3">

                            <div class="col-md-10">
                                <div class="input-group ">
                                    <input name="file" type="file" id="file" onchange="validateFile()" class="form-control" required>
                                    <span class="input-group-addon bg-custom b-0"><i
                                            class="mdi mdi-calendar text-white"></i></span>
                                </div><!-- input-group -->
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary ">submit</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('script')
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-user').on('click',function(e){
            e.preventDefault();
            var form = $(this).parents('form');
            // var id= $(this).attr('data-id');
            swal({
                title: "Ingin Menghapus?",
                text: "Kamu akan menghapus data pengelola",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                        swal("Data Berhasil Dihapus !", {
                        icon: "success",
                    });
                    form.submit();
                }
                
            });
        });
       
    </script>
    <script>
        function edit(gambar, id) {
            console.log('edit: ' + gambar);
            document.getElementById("gambar_id").value = id;
            document.getElementById("gambar_src").src = gambar;
        }

        function edit_data(data,usaha,pelanggan) {
            console.log(data);
            console.log(usaha);
            // console.log(pelanggan[0]['nama']);
            document.getElementById("edit_id").value = data['id'];
            document.getElementById("edit_usah").value = data['nama_usaha'];
            document.getElementById("datepicker-autoclose2").value = data['tanggal'];
            document.getElementById("edit_pelang").value = pelanggan;
            document.getElementById("edit_catat").value = data['catatan'];
        }

        function validateFile() {
            var input = document.getElementById("file");
            if (input.files.length > 0) {
                var file = input.files[0];
                if (file.type.match(/image\/.*/)) {
                    if (file.size <= (1048576*2)) {
                        // file is a valid image and its size is under 1MB
                    } else {
                        alert("Ukuran file terlalu besar. Maksimum ukuran 1MB.");
                    }
                } else {
                    alert("Tipe file tidak valid, tolong masukan file gambar.");
                }
            } else {
                alert("Harap memilih file.");
            }
        }
    </script>
@endsection
