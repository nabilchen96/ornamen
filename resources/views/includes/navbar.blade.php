<nav style="box-shadow: rgb(0 0 0 / 7%) 0px 4px 6px -1px;"
    class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">
            
            <div class="mb-2 text-success">
                <img src="/images/logoornamen.jpg" width="50px" alt="Logo">
                &nbsp; Organic Mangement Business
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon">

            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories') }}" class="nav-link">Shop</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kontak.index') }}" class="nav-link">Kontak</a>
                </li>
                <li class="nav-item">
                    @if (!auth::check())
                    <a href="{{ route('login') }}" class="btn btn-success nav-link px-4 text-white">Sign In</a>
                    @endif
                </li>
            </ul>
            @if (auth::check())
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                        <img src="{{ auth::user()->foto ? '/images/avatar.png' : '/foto_profil/'.auth::user()->foto }}"
                            class="rounded-circle mr-2 profile-picture" alt="">
                        Hi, {{ strtok(auth::user()->name, " ") }}
                    </a>
                    <div class="dropdown-menu">
                        {{-- <a href="/dashboard-account.html" class="dropdown-item">Settings</a> --}}
                        {{-- <div class="dropdown-divider"></div> --}}
                        <a href="/" class="dropdown-item">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link d-inline-block mt-2">
                        <img src="/images/Group.png" alt="">
                        <div class="card-badge">3</div>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <div class="nav-link">
                        Hi, {{ strtok(auth::user()->name, " ") }}
                    </div>
                </li>
                <li class="nav-item">
                    <div class="nav-link">
                        Cart
                    </div>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>

@if (request()->is('login') || request()->is('register') || auth::check() == false)

@else
<section>
    <div class="container" style="margin-top: 100px; margin-bottom: -70px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light text-center" style="border-radius: 15px;"
            data-aos="fade-down">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link mx-2 {{ (request()->is('pengelolaankebun')) ? 'active' : ''}}"
                            href="{{ route('pengelolaankebun.index') }}">Pengelolaan Kebun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 {{ (request()->is('aktivitas')) ? 'active' : ''}}"
                            href="{{ route('aktivitas.index') }}">Aktivitas dan Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 {{ (request()->is('kemitraan')) ? 'active' : ''}}"
                            href="{{ route('kemitraan.index') }}">Kemitraan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">Jual Hasil Panen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 {{ (request()->is('inventory')) ? 'active' : ''}}"
                            href="{{ route('inventory.index') }}">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 {{ (request()->is('keuangan')) ? 'active' : ''}}"
                            href="{{ route('keuangan.index') }}">Keuangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 {{ (request()->is('profil')) ? 'active' : ''}}"
                            href="{{ route('profil.index') }}">Profil Anda</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
@endif