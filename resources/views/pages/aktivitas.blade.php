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
                                <h3>Aktivitas dan Kegiatan</h3>
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
                                aria-controls="home" aria-selected="true">Kalender</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Tabel Kegiatan</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="calendar"></div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="">
                                <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target=".modal"
                                    data-array="">
                                    Tambah Kegiatan
                                </a>
                                <div class="table-responsive" style="margin-top: 20px;">
                                    <table class="table table-hover table-striped scroll-horizontal-vertical w-100"
                                        id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Kegiatan</th>
                                                <th>Keterangan Kegiatan</th>
                                                <th>Waktu Kegiatan</th>
                                                <th style="width: 5%"></th>
                                                <th style="width: 10%"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $k => $item)
                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ $item->nama_kegiatan }}</td>
                                                <td>{{ $item->keterangan_kegiatan }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->mulai_kegiatan)) }} -
                                                    {{ date('d-m-Y', strtotime($item->akhir_kegiatan)) }}</td>
                                                <td style="width: 5%">
                                                    <a href="#" data-toggle="modal" data-target=".modal"
                                                        data-array="{{ $data[$k] }}" class="btn btn-success">Edit</a>
                                                </td>
                                                <td style="width: 10%">
                                                    <a href="{{ url('hapusaktivitas') }}/{{ $item->id_aktivitas }}"
                                                        class="btn btn-danger">Hapus</a>
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
        </div>
    </section>
</div>

<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">From Aktivitas </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formtemplate" action="" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ auth::user()->id }}">
                <input type="hidden" name="id_aktivitas" id="id_aktivitas">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Kegiatan</label>
                        <input type="text" class="form-control" name="nama_kegiatan" id="nama_kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="">Keterangan Kegiatan</label>
                        <textarea name="keterangan_kegiatan" class="form-control" rows="5"
                            id="keterangan_kegiatan"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Mulai Kegiatan</label>
                        <input type="date" name="mulai_kegiatan" id="mulai_kegiatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Akhir Kegiatan</label>
                        <input type="date" name="akhir_kegiatan" id="akhir_kegiatan" class="form-control">
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

{{-- <script src="http://momentjs.com/downloads/moment.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
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
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        select: function(arg) {},
        events: [
            <?php
            
                $aktivitas = DB::table('aktivitas')
                            ->where('id', auth::user()->id)
                            ->get();
            ?>
            @foreach ($aktivitas as $a)
            {
                title: '<?php echo $a->nama_kegiatan; ?>',
                start: '<?php echo $a->mulai_kegiatan; ?>',  
                end: `<?php 
                        $date=date_create($a->akhir_kegiatan);
                        date_add($date,date_interval_create_from_date_string("1 days"));
                        echo date_format($date,"Y-m-d");
                    ?>`  
            },
            @endforeach
        ],
        selectOverlap: function(event) {
            return event.rendering === 'background';
        }
      });

      calendar.render();
    });

</script>
<script>
    $('.modal').on('show.bs.modal', function (event) {
      var button  = $(event.relatedTarget)
      var data    = button.data('array');
      var modal   = $(this)

      if(data === ''){
        $('#formtemplate').attr('action', "{{ route('aktivitas.store') }}").trigger('reset')
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