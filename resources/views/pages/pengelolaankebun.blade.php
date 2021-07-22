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
                        <ol class="breadcrumb mb-4" style="border-radius: 8px;">
                            <li class="breadcrumb-item">
                                <h2>Halaman Pengelolaan Kebun</h2>
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
                <div class="">
                    <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-array="" data-target=".modal">
                        Tambah Kebun
                    </a>
                    <div class="table-responsive" style="margin-top: 20px;">
                        <table class="table table-hover table-striped scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanaman</th>
                                    <th>Pupuk</th>
                                    <th>Media Tanam</th>
                                    <th>Luas Tanah</th>
                                    <th>Mulai Tanam</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelola_tanaman as $k => $item)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $item->nama_tanaman }}</td>
                                        <td>{{ $item->nama_pupuk }}</td>
                                        <td>{{ $item->nama_media }}</td>
                                        <td>{{ $item->luas_tanah }} M<sup>2</sup></td>
                                        <td>{{ $item->waktu_tanam }}</td>
                                        <td>
                                            <a href="#" class="btn btn-success">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">From Kelola Kebun </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formtemplate" action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ auth::user()->id }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-8">
                                    <label for="">Tanaman / Stok</label>
                                    <select name="id_tanaman" class="form-control" required>
                                        @foreach ($bibit as $bibit)
                                        <option value="{{ $bibit->id_inventaris_user }}">{{ $bibit->nama_inventaris }} / ({{ $bibit->total_stok }})
                                            Batang</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Dipakai (bibit)</label>
                                    <input type="number" name="tanaman_dipakai" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-8">
                                    <label for="">Jenis Pupuk / Stok</label>
                                    <select name="id_pupuk" class="form-control" required>
                                        @foreach ($pupuk as $pupuk)
                                        <option value="{{ $pupuk->id_inventaris_user }}">{{ $pupuk->nama_inventaris }} / ({{ $pupuk->total_stok }})
                                            Kg</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Dipakai (kg)</label>
                                    <input type="number" step="0.1" name="pupuk_dipakai" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-8">
                                    <label for="">Media Tanam / Stok</label>
                                    <select name="id_media_tanam" class="form-control" required>
                                        @foreach ($media_tanam as $media)
                                        <option value="{{ $media->id_inventaris_user }}">{{ $media->nama_inventaris }} / ({{ $media->total_stok }})
                                            Item</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="">Dipakai (item)</label>
                                    <input type="number" name="media_tanam_dipakai" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Luas Tanah</label>
                            <input type="number" name="luas_tanah" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Waktu Tanam</label>
                            <input type="date" name="waktu_tanam" class="form-control" required>
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
        $('.modal').on('show.bs.modal', function (event) {
            var button  = $(event.relatedTarget)
            var data    = button.data('array');
            var modal   = $(this)

            if(data === ''){
                $('#formtemplate').attr('action', "{{ route('pengelolaankebun.store') }}").trigger('reset')
            }else{
                $('#formtemplate').attr('action', "{{ url('updateaktivitas') }}")

                modal.find('#id_aktivitas').val(data.id_aktivitas)
                modal.find('#id').val(data.id)
                modal.find('#nama_kegiatan').val(data.nama_kegiatan)
                modal.find('#keterangan_kegiatan').val(data.keterangan_kegiatan)
                modal.find('#mulai_kegiatan').val(data.mulai_kegiatan)
                modal.find('#akhir_kegiatan').val(data.akhir_kegiatan)
            }
        })
    </script>
    @endpush