@extends('layouts.app')

@push('addon-style')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css"/>
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
                                <h2>Halaman Keuangan</h2>
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#keuangan" role="tab"
                                aria-controls="home" aria-selected="true">Keuangan</a>
                        </li>
                    </ul>
                    <div class="tab-content mt-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="keuangan" role="tabpanel" aria-labelledby="home-tab">
                            <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target=".modal">
                                Tambah
                            </a>
                            <div class="table-responsive" style="margin-top: 20px;">
                                <table class="table table-hover table-striped scroll-horizontal-vertical w-100 crudTable" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Keluar</th>
                                            <th>Masuk</th>
                                            <th>Total Saldo</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    
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
        <div class="modal-body">
            <form action="">
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="" class="form-control" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Saldo</label>
                    <select name="" class="form-control" id="">
                        <option value="">Keluar</option>
                        <option value="">Masuk</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Biaya/Saldo</label>
                    <input type="number" class="form-control">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success">Simpan</button>
        </div>
    </div>
</div>
</div>

@endsection

@push('addon-script')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script>
    $(document).ready( function () {
        $('.crudTable').DataTable();
    } );
</script>
@endpush