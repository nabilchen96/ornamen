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
                                <h3>Halaman Jual Hasil Panen</h3>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-array=""
                            data-target="#modaltambah">
                            Tambah Stok Dijual
                        </a>
                        <div class="table-responsive" style="margin-top: 20px;">
                            <table class="table table-hover table-striped scroll-horizontal-vertical w-100"
                                id="crudTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Judul Keterangan</th>
                                        <th>Satuan Jual</th>
                                        <th>Stok</th>
                                        <th>Harga Jual</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $k => $item)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td width="100px">
                                            <img src="{{ asset('foto_produk') }}/{{ $item->foto_produk }}"
                                                style="border-radius: 15px; width: 50px; height: 50px; object-fit: cover;"
                                                alt="">
                                        </td>
                                        <td>{{ $item->judul_keterangan }}</td>
                                        <td>{{ $item->ukuran_jual }}</td>
                                        <td>{{ $item->stok }}</td>
                                        <td>Rp. {{ number_format($item->harga) }}</td>
                                        <td width="150px;">
                                            <a href="#" class="btn btn-success" data-toggle="modal"
                                                data-target="#tambahstok{{ $item->id_jual_hasil }}">Update Stok</a>
                                            <div class="modal fade" id="tambahstok{{ $item->id_jual_hasil }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Stok
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ url('updatestokjualhasil') }}" method="POST">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <input type="hidden" name="id_jual_hasil"
                                                                    value="{{ $item->id_jual_hasil }}">
                                                                <div class="form-group">
                                                                    <label for="">Stok</label>
                                                                    <input type="number" class="form-control"
                                                                        name="stok" placeholder="">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Kurangi/Tambah</label>
                                                                    <select name="operator" class="form-control">
                                                                        <option value="kurang">Kurangi</option>
                                                                        <option value="tambah">Tambah</option>
                                                                    </select>
                                                                </div>
                                                                {{-- <br>
                                                            <div class="form-group">
                                                                <p>
                                                                    Jika terjadi kesalahan input, 
                                                                    anda dapat mengurangi atau menambah
                                                                    stok dengan mengisi form ini.
                                                                </p>
                                                            </div> --}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal{{ $item->id_jual_hasil }}">Edit</a>
                                            <div class="modal fade" id="modal{{ $item->id_jual_hasil }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Jual
                                                                Hasil
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ url('updatejualhasil') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @csrf
                                                                <input type="hidden" name="id_jual_hasil"
                                                                    value="{{ $item->id_jual_hasil }}">
                                                                <div class="form-group">
                                                                    <label for="">Judul Keterangan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="judul_keterangan"
                                                                        value="{{ $item->judul_keterangan }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Ukuran Jual</label>
                                                                    <input type="text" class="form-control"
                                                                        name="ukuran_jual"
                                                                        value="{{ $item->ukuran_jual }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Harga</label>
                                                                    <input type="number" class="form-control"
                                                                        name="harga" value="{{ $item->harga }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="">Foto Produk</label>
                                                                    <input type="file" class="form-control"
                                                                        name="foto_produk">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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
    </section>

    <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">From Jula Hasil Kebun </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formtemplate" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ auth::user()->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Hasil Dijual</label>
                            <select name="id_inventaris" class="form-control" id="id_inventaris" required>
                                @foreach ($inven as $i)
                                <option value="{{ $i->id_inventaris }}">{{ $i->nama_inventaris }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Judul Keterangan</label>
                            <input type="text" class="form-control" name="judul_keterangan">
                        </div>
                        <div class="form-group">
                            <label for="">Ukuran Jual</label>
                            <input type="text" name="ukuran_jual" class="form-control" placeholder="contoh: kg">
                            <p>*contoh: kg, gram, ons, atau per-ikat, dll</p>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah</label>
                            <input type="number" class="form-control" name="stok" id="jumlah" required>
                            <p>*Jumlah adalah total ukuran jual</p>
                        </div>
                        <div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" required>
                                <p>*Harga per ukuran jual</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Foto Produk</label>
                            <input type="file" class="form-control" name="foto_produk" required>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
            $('#crudTable').DataTable();
        } );
    </script>
    <script>
        $('#modaltambah').on('show.bs.modal', function (event) {
            var button  = $(event.relatedTarget)
            var data    = button.data('array');
            var modal   = $(this)

            if(data === ''){
                $('#formtemplate').attr('action', "{{ url('simpanjualhasil') }}").trigger('reset')
            }
        })
    </script>
    @endpush