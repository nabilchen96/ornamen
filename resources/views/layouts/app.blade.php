<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>

    {{-- Navbar --}}
    @include('includes.navbar')

    {{-- page content --}}
    @yield('content')


    {{-- Footer --}}
    @include('includes.footer')

    {{-- Script --}}
   
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>

</html>