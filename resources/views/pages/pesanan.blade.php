@extends('layouts.app')

@push('addon-style')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@endpush

@section('content')

<div class="page-content page-auth" id="register">

    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-2">
                    <nav>
                        <ol class="breadcrumb" style="border-radius: 8px;">
                            <li class="breadcrumb-item">
                                <h3>Halaman Pesanan</h3>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section style="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive" style="margin-top: 20px;">
                                <table
                                    class="table table-hover table-striped scroll-horizontal-vertical w-100 crudTable"
                                    id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tgl</th>
                                            <th>Pesanan</th>
                                            <th>Ongkir</th>
                                            <th>Total Harga</th>
                                            <th>Resi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Tambah Inventaris </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('inventory.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ auth::user()->id }}">
                    <div class="form-group">
                        <label for="">Jenis Stok</label>
                        <select id="jenis_stok" name="jenis_inventaris" onchange="isi_otomatis()" class="form-control">
                            <option value="kosong">--Pilih Jenis Inventaris--</option>
                            <option value="bibit">Bibit</option>
                            <option value="media tanam">Media Tanam</option>
                            <option value="pupuk">Pupuk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Stok</label>
                        <select name="id_inventaris" id="nama_inventaris" class="form-control">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Stok Masuk</label>
                        <div class="row">
                            <div class="col-lg-9">
                                <input type="number" name="stok_masuk" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="satuan" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Total Biaya</label>
                        <input type="number" name="biaya" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('addon-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
    @if($message = Session::get('sukses'))
        toastr.success("{{ $message }}")
    @elseif($message = Session::get('gagal'))
        toastr.error("{{ $message }}")
    @elseif($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>
<script>
    $(document).ready( function () {
        $('.crudTable').DataTable();
    } );
</script>
<script>
    function isi_otomatis(){
        var jenis_stok = $("#jenis_stok").val();
        $.ajax({
            url: '{{ url("daftar_inventaris") }}/'+jenis_stok,
        }).success(function (data) {
            if(data[0]){
                $("#nama_inventaris").empty()
                for (let index = 0; index < data[0].length; index++) {
                    // const element = array[index];
                    // console.log(data[0][index]['nama_inventaris'])
                    $("#nama_inventaris").append('<option value="'+data[0][index]["id_inventaris"]+'">'+data[0][index]["nama_inventaris"]+'</option>');
                    $("#satuan").val(data[0][0]['satuan_inventaris'])
                }
            }
            // else{
            // //     $("#satuan").val("kosong")
            // //     $("#nama_inventaris").append('<option>---Tidak Ada Inventaris---</option>');
            // // }
            
        });
    }
</script>
@endpush