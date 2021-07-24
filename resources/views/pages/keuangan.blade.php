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
                                <h3>Halaman Keuangan</h3>
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
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#keuangan"
                                        role="tab" aria-controls="home" aria-selected="true">Keuangan</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="keuangan" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-array=""
                                        data-target=".modal">
                                        Tambah
                                    </a>
                                    <div class="table-responsive" style="margin-top: 20px;">
                                        <table
                                            class="table table-hover table-striped scroll-horizontal-vertical w-100 crudTable"
                                            id="crudTable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th width="200">Keterangan</th>
                                                    <th>Tanggal</th>
                                                    <th>Keluar</th>
                                                    <th>Masuk</th>
                                                    <th>Total Saldo</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $saldo = 0; ?>
                                                @foreach ($data as $k => $item)
                                                <tr>
                                                    <td>{{ $k+1 }}</td>
                                                    <td>{{ $item->keterangan }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                                    <td>
                                                        <?php $saldo_keluar; ?>
                                                        Rp.
                                                        {{ $item->jenis_saldo == 'keluar' ? number_format($saldo_keluar = $item->biaya) : '-'}}
                                                    </td>
                                                    <td>
                                                        <?php $saldo_masuk = 0; ?>
                                                        Rp.
                                                        {{ $item->jenis_saldo == 'masuk' ? number_format($saldo_masuk = $item->biaya) : '-' }}
                                                    </td>
                                                    <td>
                                                        <?php  $saldo = $item->jenis_saldo == 'masuk' ? $saldo + $item->biaya : $saldo - $item->biaya; ?>
                                                        Rp. {{ number_format($saldo) }}
                                                    </td>
                                                    <td>
                                                        @if ($item->id_keluar != null || $item->id_masuk != null)
                                                        <button class="btn btn-success" disabled>Edit</button>
                                                        @else
                                                        <a href="#" data-target=".modal" data-toggle="modal"
                                                            data-array="{{ $data[$k] }}"
                                                            class="btn btn-success">Edit</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->id_keluar != null || $item->id_masuk != null)
                                                        <button class="btn btn-danger" disabled>Hapus</button>
                                                        @else
                                                        <a href="{{ url('hapuskeuangan') }}/{{ $item->id_keuangan }}"
                                                            class="btn btn-danger">Hapus</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="proyeksi">
                                    ...
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
                <h5 class="modal-title" id="exampleModalLongTitle">Form Keuangan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formtemplate" action="" method="POST">
                @csrf
                <input type="hidden" name="id_keuangan" id="id_keuangan">
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ auth::user()->id }}" required>
                    <div class="form-group">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Saldo</label>
                        <select name="jenis_saldo" class="form-control" id="jenis_saldo" required>
                            <option value="keluar">Keluar</option>
                            <option value="masuk">Masuk</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Biaya/Saldo</label>
                        <input type="number" name="biaya" id="biaya" class="form-control" required>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
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
    $('.modal').on('show.bs.modal', function (event) {
      var button  = $(event.relatedTarget)
      var data    = button.data('array');
      var modal   = $(this)

      if(data === ''){
        $('#formtemplate').attr('action', "{{ route('keuangan.store') }}").trigger('reset')
      }else{
        $('#formtemplate').attr('action', "{{ url('updatekeuangan') }}")

        modal.find('#id_keuangan').val(data.id_keuangan)
        modal.find('#tanggal').val(data.tanggal)
        modal.find('#keterangan').val(data.keterangan)
        modal.find('#jenis_saldo').val(data.jenis_saldo)
        modal.find('#biaya').val(data.biaya)
      }
    })
</script>
@endpush