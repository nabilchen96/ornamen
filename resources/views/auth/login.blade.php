@extends('layouts.app')

@section('title')
Login Page
@endsection

@push('addon-style')
<style>
    .navbar{
        background: white;
    }
</style>
@endpush

@section('content')

<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <br><br><br>
        <div class="container mt-4">
            <div class="row row-login">
                <div class="col-lg-6">
                    <img src="{{ asset('images/farmers-market.jpg') }}"
                        style="border-radius: 15px; height: 70%; object-fit: cover; float:center;"
                        class="w-100 mb-lg-none" alt="">
                </div>
                <div class="col-lg-6">
                    <h2>Masuk untuk Membeli<br>atau Menjual Hasil Panen Organik</h2>
                    <form method="POST" action="{{ route('login') }}" class="mt-4">
                        @csrf
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-block btn-success mt-4">
                            Sign In to My Account
                        </button>
                        <a href="{{ route('register') }}" class="btn btn-block btn-signup mt-2">
                            Sign Up Account
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container d-none">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection