@extends('layouts.app')

@section('title')
Store Home Page
@endsection

@push('addon-style')
<style>
    .flickity-page-dots {
        display: none !important;
    }

    .navbar {
        background: white;
    }

    @media only screen and (max-width: 600px) {
        iframe{
            height: 300px !important;
        }

        .img-carousel{
            height: 180px !important;
            object-position: left;
            object-fit: cover;
            margin-top: 60px;
            margin-bottom: 60px;
        }

        .carousel-for-image{
            height: 300px;
            background: black;
        }
    }
</style>
@endpush

@section('content')
<div class="page-content page-home">
    <section class="store-carousel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" data-aos="zoom-in">
                    <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                            <li data-target="#storeCarousel" data-slide-to="1"></li>
                            <li data-target="#storeCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" style="border-radius: 15px;">
                            <div class="carousel-item carousel-for-image active">
                                <img src="{{ asset('images/slider/omb_2.png') }}" alt="" class="img-carousel d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <iframe style="      
                                width: 100%;
                                height: 420px;
                                object-fit: cover;" class="d-block w-100"
                                    src="https://www.youtube.com/embed/qOfaBMjEE_Q" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                            <div class="carousel-item">
                                <iframe style="      
                                width: 100%;
                                height: 420px;
                                object-fit: cover;" class="d-block w-100"
                                    src="https://www.youtube.com/embed/yVxG4riCZ0Q" frameborder="0"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="bg-success mb-4"
                        style="width: fit-content; padding: 10px; border-radius: 50px; color:white;">Organic Plants</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ asset('images/plant-categories/001-watermelon.png') }}" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Buah
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ asset('images/plant-categories/004-cabbage.png') }}" alt="" class="w-100">
                        </div>
                        <p class="categories-text text-center">
                            Sayuran
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ asset('images/plant-categories/002-corn.png') }}" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Jagung
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ asset('images/plant-categories/003-hot-pepper.png') }}" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Kacang
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ asset('images/plant-categories/025-carrot.png') }}" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Umbi
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="{{ asset('images/plant-categories/019-kiwi.png') }}" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Bibit
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="store-new-product">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5 class="bg-success mb-4"
                        style="width: fit-content; padding: 10px; border-radius: 50px; color:white;">Products</h5>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('images/products/apel.jfif') }}');">

                            </div>
                        </div>
                        <div class="products-text">
                            Apel Fuji Sak Super (kg)
                        </div>
                        <div class="products-price">
                            Rp. 50.000
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('images/products/pear.jfif') }}');">

                            </div>
                        </div>
                        <div class="products-text">
                            Buah Pear Madu Termurah
                        </div>
                        <div class="products-price">
                            Rp. 27.000
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('images/products/pisang.jpg') }}');">

                            </div>
                        </div>
                        <div class="products-text">
                            Pisang Pertandan Manis
                        </div>
                        <div class="products-price">
                            Rp. 25.000
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('images/products/jagung.jfif') }}');">

                            </div>
                        </div>
                        <div class="products-text">
                            Jagung Kering
                        </div>
                        <div class="products-price">
                            Rp. 20.000
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('images/products/beras.jfif') }}');">

                            </div>
                        </div>
                        <div class="products-text">
                            Beras Curah Serang (kg)
                        </div>
                        <div class="products-price">
                            Rp. 10.000
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('images/products/jeruk.jpg') }}');">

                            </div>
                        </div>
                        <div class="products-text">
                            Jeruk Nanfeng Impor
                        </div>
                        <div class="products-price">
                            Rp. 6000
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="700">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('images/products/alpukat.jpg') }}');">

                            </div>
                        </div>
                        <div class="products-text">
                            Alpukat Mentega Super
                        </div>
                        <div class="products-price">
                            Rp 24.000
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800">
                    <a href="/details.html" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('images/products/cabe.jfif') }}')">

                            </div>
                        </div>
                        <div class="products-text">
                            Cabe Merah Kriting (kg)
                        </div>
                        <div class="products-price">
                            Rp. 9.999
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="container" style="margin-bottom: 50px;">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5 class="bg-success mb-4"
                        style="width: fit-content; padding: 10px; border-radius: 50px; color:white;">Webinar</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up">
                    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                        <div class="gallery-cell"
                            style="width: 300px; height: 500px; border-radius: 15px; margin-left: 15px;">
                            <img style="object-fit: cover; width: 300px; height: 500px; border-radius: 15px;"
                                src="{{ asset('images/webinar1.jpg') }}" alt="">
                        </div>
                        <div class="gallery-cell"
                            style="width: 300px; height: 500px; background: green; border-radius: 15px; margin-left: 15px;">
                            <img style="object-fit: cover; width: 300px; height: 500px; border-radius: 15px;"
                                src="{{ asset('images/webinar2.jpg') }}" alt="">
                        </div>
                        <div class="gallery-cell"
                            style="width: 300px; height: 500px; background: green; border-radius: 15px; margin-left: 15px;">
                            <img style="object-fit: cover; width: 300px; height: 500px; border-radius: 15px;"
                                src="{{ asset('images/webinar3.jpeg') }}" alt="">
                        </div>
                        <div class="gallery-cell"
                            style="width: 300px; height: 500px; background: green; border-radius: 15px; margin-left: 15px;">
                            <img style="object-fit: cover; width: 300px; height: 500px; border-radius: 15px;"
                                src="{{ asset('images/webinar4.jpg') }}" alt="">
                        </div>
                        <div class="gallery-cell"
                            style="width: 300px; height: 500px; background: green; border-radius: 15px; margin-left: 15px;">
                            <img style="object-fit: cover; width: 300px; height: 500px; border-radius: 15px;"
                                src="{{ asset('images/webinar4.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-3">
        <div class="container" style="padding-left: 30px; padding-right: 30px;">
            <div class="row">
                <div class="col-lg-12"
                    style="background: #f4f4f4; width: 100%; margin: auto; border-radius: 15px; padding: 20px;">
                    <div class="row">
                        <div class="col-lg-6" style="border-radius: 15px;">
                            <img src="{{ asset('images/market.jpg') }}" style="border-radius: 15px;" class="w-100"
                                alt="">
                        </div>
                        <div class="col-lg-6">
                            <h1>Organic Management Business</h1>
                            <br>
                            <p>
                                Pertanian organik adalah sistem budidaya pertanian yang mengandalkan bahan-bahan alami
                                tanpa menggunakan bahan kimia sintetis.
                                Tujuan utama pertanian organik adalah menyediakan produk-produk pertanian yang aman
                                konsumsi dan tidak menimbulkan pencemaran
                                lingkungan. Sehingga kelestarian hayati tetap terjaga. Pertanian organik juga diharapkan
                                mampu menciptakan petani yang terampil. Dengan
                                pertanian organik mereka harus dapat memanfaatkan alam seutuhnya.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection