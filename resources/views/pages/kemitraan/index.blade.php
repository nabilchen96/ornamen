@extends('layouts.app')

@push('addon-style')
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
                                <h3>Halaman Kemitraan</h3>
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
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Group Petani</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Acara dan Webinar</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#konsultasi" role="tab"
                                        aria-controls="profile" aria-selected="false">Konsultasi</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target=".modal">
                                        Gabung Group
                                    </a>
                                    <div class="table-responsive" style="margin-top: 20px;">
                                        <table
                                            class="table table-hover table-striped scroll-horizontal-vertical w-100 crudTable"
                                            id="crudTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    {{-- <th>Nomor Telegram</th> --}}
                                                    <th>Group</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($group as $k => $item)
                                                <tr>
                                                    <td>{{ $k+1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    {{-- <td>{{ $item->nomor_telegram }}</td> --}}
                                                    <td>{{ $item->nama_inventaris }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="table-responsive" style="margin-top: 40px;">
                                        <table
                                            class="table table-hover table-striped scroll-horizontal-vertical w-100 crudTable"
                                            id="crudTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th width="50px">Gambar</th>
                                                    <th>Judul Acara</th>
                                                    <th>Keterangan</th>
                                                    <th>Jadwal</th>
                                                    <th>Pemateri</th>
                                                    <th>Link</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($webinar as $k => $item)
                                                <tr>
                                                    <td>{{ $k+1 }}</td>
                                                    <td width="50px">
                                                        <img src="{{ asset('webinar') }}/{{ $item->gambar }}"
                                                            style="border-radius: 15px; width: 100px; height: 100px; object-fit: cover;"
                                                            alt="">
                                                    </td>
                                                    <td>{{ $item->judul_acara }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>{{ date('d-m-Y H:i:s', strtotime($item->jadwal)) }}</td>
                                                    <td>{{ $item->pemateri }}</td>
                                                    <td>{{ $item->link }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="konsultasi" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <a href="#" class="btn btn-primary mb-4" data-toggle="modal"
                                        data-target="#modalkonsultasi">
                                        Buat Konsultasi
                                    </a>
                                    <div class="table-responsive" style="margin-top: 40px;">
                                        <table
                                            class="table table-hover table-striped scroll-horizontal-vertical w-100 crudTable"
                                            id="crudTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tgl Konsultasi</th>
                                                    <th>Judul Konsultasi</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($konsultasi as $k => $item)
                                                <tr>
                                                    <td>{{ $k+1 }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                    <td>{{ $item->judul_konsultasi }}</td>
                                                    <td width="10%">
                                                        <a href="{{ url('konsultasi') }}/{{ $item->id_konsultasi }}"
                                                            class="btn btn-success">Detail</a>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Form Gabung Group Telegram</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formtemplate" action="{{ url('tambahgabunggroup') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Pilih Group</label>
                        <?php
                        
                             $inventaris = DB::table('daftar_inventaris')->where('jenis_inventaris', 'bibit')->get();
                        
                        ?>
                        <select class="form-control" name="id_inventaris">
                            @foreach ($inventaris as $i)
                            <option value="{{ $i->id_inventaris }}">{{ $i->nama_inventaris }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Telegram</label>
                        <input type="text" name="nomor_telegram" class="form-control">
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
<div class="modal fade" id="modalkonsultasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form Gabung Group Telegram</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('tambahkonsultasi') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ auth::user()->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Judul Konsultasi</label>
                        <textarea name="judul_konsultasi" rows="5" class="form-control"></textarea>
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

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
@endpush