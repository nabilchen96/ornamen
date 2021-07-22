<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  @stack('prepend-style')
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="/style/main.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css" />
  @stack('addon-style')
</head>

<body>

  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- sidebar -->
      <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
          <img src="/images/icon.png" class="my-4" width="150" alt="">
        </div>
        <div class="list-group list-group-flush">
          <a href="{{ route('admin-dashboard') }}" class="list-group-item list-group-item-action">
            Dashboard
          </a>
        </div>
        <div class="list-group list-group-flush">
          <a href="/dashboard-products.html" class="list-group-item list-group-item-action">
            Products
          </a>
        </div>
        <div class="list-group list-group-flush">
          <a href="{{ route('category.index') }}"
            class="list-group-item list-group-item-action {{ (request()->is('admin/category*')) ? 'active' : ''}}">
            Categories
          </a>
        </div>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action">
            Transactions
          </a>
        </div>
        <div class="list-group list-group-flush">
          <a href="#" class="list-group-item list-group-item-action">
            Users
          </a>
        </div>
        <div class="list-group list-group-flush">
          <a href="/logout.html" class="list-group-item list-group-item-action">
            Sign Out
          </a>
        </div>
      </div>

      <!-- page content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top" data-aos="fade-down">
          <div class="container-fluid">
            <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
              &laquo; Menu
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
              <span class="navbar-toggler-icon">

              </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <!-- Desktop Menu -->
              <ul class="navbar-nav d-none ml-auto d-lg-flex">
                <li class="nav-item dropdown">
                  <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown">
                    <img src="/images/user_pc.png" class="rounded-circle mr-2 profile-picture" alt="">
                    Hi, Nabil
                  </a>
                  <div class="dropdown-menu">
                    <a href="/" class="dropdown-item">Logout</a>
                  </div>
                </li>

              </ul>
              <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                  <div class="nav-link">
                    Hi, Angga
                  </div>
                </li>
                <li class="nav-item">
                  <div class="nav-link">
                    Cart
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        {{-- content --}}
        @yield('content')
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript -->
  @stack('prepend-script')
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $('#menu-toggle').click(function (e){
      e.preventDefault();
      $('#wrapper').toggleClass('toggled');
    })
  </script>
  @stack('addon-script')
</body>

</html>