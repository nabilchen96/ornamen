@extends('layouts.app')

@push('addon-style')
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
                                <h2>Halaman Profil</h2>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row row-login">
                <form method="POST" action="{{ route('profil.update', auth::user()->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ auth::user()->name }}" name="name"
                                        autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" class="form-control">
                                        <option {{ auth::user()->jk == 'L' ? 'selected' : '' }} value="L">Laki-laki
                                        </option>
                                        <option {{ auth::user()->jk == 'P' ? 'selected' : '' }} value="P">Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" name="nama_toko" value="{{ auth::user()->nama_toko }}"
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ auth::user()->email }}"
                                        name="email">
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telpon</label>
                                    <input type="text" name="notelp" class="form-control"
                                        value="{{ auth::user()->notelp }}">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control"
                                        rows="9">{{ auth::user()->alamat }}</textarea>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <button class="btn btn-success">Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="form-group row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-10">
                                            <label>Foto Profil</label>
                                        </div>
                                        <div class="col-lg-2">
                                            @if (auth::user()->foto == null)
                                            <img src="/images/icon.png" class="w-100" alt="">
                                            @else
                                            <img src="{{ asset('foto_profil') }}/{{ auth::user()->foto }}" class="w-100"
                                                alt="">
                                            @endif
                                        </div>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="foto">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-lg-2">
                                            <img src="/images/social/001-facebook.png" class="w-100" alt="">
                                        </div>
                                        <div class="col-sm-10">
                                            <label>Facebook</label>
                                            <input type="text" class="form-control" value="{{ auth::user()->facebook }}"
                                                name="facebook">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-lg-2">
                                            <img src="/images/social/013-twitter.png" class="w-100" alt="">
                                        </div>
                                        <div class="col-sm-10">
                                            <label for="">Twitter</label>
                                            <input type="text" class="form-control" value="{{ auth::user()->twitter }}"
                                                name="twitter">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-lg-2">
                                            <img src="/images/social/011-instagram.png" class="w-100" alt="">
                                        </div>
                                        <div class="col-sm-10">
                                            <label for="">Instagram</label>
                                            <input type="text" class="form-control"
                                                value="{{ auth::user()->instagram }}" name="instagram">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <div class="col-lg-2">
                                            <img src="/images/social/016-tik-tok.png" class="w-100" alt="">
                                        </div>
                                        <div class="col-sm-10">
                                            <label for="">Tiktok</label>
                                            <input type="text" class="form-control" value="{{ auth::user()->tiktok }}"
                                                name="tiktok">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('addon-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
    // toastr.error('I do not think that word means what you think it means.', 'Inconceivable!')
</script>
@endpush