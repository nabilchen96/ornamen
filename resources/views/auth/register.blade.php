@extends('layouts.app')

@push('addon-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@endpush

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
        <br><br>
        <div class="container">
            <div class="row row-login">
                <div class="col-lg-6">
                    <img src="{{ asset('images/bufallo.jpg') }}"
                        style="border-radius: 15px; height: 100%; object-fit: cover; float:center;"
                        class="w-100 mb-lg-none" alt="">
                </div>
                <div class="col-lg-6">
                    <h2>Daftarkan Diri dan, <br>Tingkatkan Skill Pertanian Anda</h2>
                    <form method="POST" class="mt-3" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" class="form-control" name="name" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jk" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telpon</label>
                            <input type="text" name="notelp" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-block btn-success mt-4">
                            Sign Up Now
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-block btn-signup mt-2">
                            Back to Sign In
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('addon-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
    // toastr.error('I do not think that word means what you think it means.', 'Inconceivable!')
</script>
@endpush