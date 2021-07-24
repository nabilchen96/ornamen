@extends('layouts.app')

@push('addon-style')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css' rel='stylesheet' />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css" />
<style>
    .navbar{
        background: white;
    }
</style>
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
                                <h3>Halaman Konsultasi</h3>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container"
            style="background:#f8f9fa !important; padding-top: 20px; padding-bottom: 20px; border-radius: 15px; width: 82%; margin-bottom: 10px;">
            <h4>Pertanyaan: {{ $data[0]->judul_konsultasi }}</h4>
            Dibuat Tanggal: {{ date('d-m-Y', strtotime($data[0]->konsultasi_dibuat)) }}
        </div>
        <div class="container"
            style="background:#f8f9fa !important; padding-top: 20px; border-radius: 15px; width: 82%">
            @foreach ($data as $item)
            @if ($item->pemilik_pesan == 'user')
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-2">
                            <img src="{{ auth::user()->foto == null ? '/images/avatar.png' : '/foto_profil/'.auth::user()->foto}}"
                                class="w-100" alt="">
                            <p class="mt-1 text-center">You</p>
                        </div>
                        <div class="col-lg-10">
                            <div style="background: #ebebeb none repeat scroll 0 0;
                            border-radius: 3px;
                            color: #646464;
                            font-size: 14px;
                            /* margin: 0; */
                            padding: 5px 10px 5px 12px;
                            width: fit-content">
                                <p>{{ $item->pesan }}</p>
                                {{ date('d-m-Y', strtotime($item->detail_konsultasi_dibuat)) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @elseif ($item->pemilik_pesan == 'admin')
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <div class="bg-primary" style="
                            border-radius: 3px;
                            color: #fff;
                            font-size: 14px;
                            margin: 0;
                            padding: 5px 10px 5px 12px;
                            /* width: fit-content; */
                            ">
                                <p>{{ $item->pesan }}</p>
                                {{ date('d-m-Y', strtotime($item->detail_konsultasi_dibuat)) }}
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <img src="/images/avatar.png" class="w-100" alt="">
                            <p class="mt-1 text-center">Admin</p>
                        </div>
                    </div>
                </div>
                <div>
                </div>
            </div>
            @endif
            @endforeach
            <br>
            <hr>
            <form action="{{ url('simpandetailkonsultasi') }}" method="POST">
                @csrf
                <div class="row mt-4" style="padding-bottom: 20px;">
                    <input type="hidden" name="id_konsultasi" value="{{ $data[0]->id_konsultasi }}">
                    <input type="hidden" name="pemilik_pesan" value="{{ auth::user()->role == 'admin' ? 'admin' : 'user' }}">
                    <div class="col-11">
                        <textarea name="pesan" class="form-control" rows="3"
                            placeholder="Kirim Pesan Anda ke Admin..."></textarea>
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success">Kirim</button>
                    </div>

                </div>
            </form>
        </div>
    </section>
</div>

@endsection

@push('addon-script')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('.crudTable').DataTable();
    } );
</script>
@endpush