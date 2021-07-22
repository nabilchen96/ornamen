@extends('layouts.app')

@section('title')
Store Category Page
@endsection

@section('content')
<div class="page-content page-home">
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <input type="text" class="form-control" style="border-radius: 15px;"
                    placeholder="Cari Produk Organik disini">
            </div>
            <div class="col-lg-1">
                <button type="button" style="border-radius: 50px;" class="btn btn-success">Cari</button>
            </div>
        </div>
    </div>
    <br>

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
                            <img src="/images/plant-categories/001-watermelon.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Buah
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="images/plant-categories/004-cabbage.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Sayuran
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/plant-categories/002-corn.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Jagung
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/plant-categories/003-hot-pepper.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Kacang
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/plant-categories/025-carrot.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Umbi
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/plant-categories/019-kiwi.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Bibit
                        </p>
                    </a>
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
                    <a href="#" data-toggle="modal" data-target="#exampleModalLong" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image" style="background-image: url('/images/products/apel.jfif');">

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
                            <div class="products-image" style="background-image: url('/images/products/pear.jfif');">

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
                            <div class="products-image" style="background-image: url('/images/products/pisang.jpg');">

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
                            <div class="products-image" style="background-image: url('/images/products/jagung.jfif');">

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
                            <div class="products-image" style="background-image: url('/images/products/beras.jfif');">

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
                            <div class="products-image" style="background-image: url('/images/products/jeruk.jpg');">

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
                            <div class="products-image" style="background-image: url('/images/products/alpukat.jpg');">

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
                            <div class="products-image" style="background-image: url('/images/products/cabe.jfif')">

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

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Apel Fuji Sak Super (kg) </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="#" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" style="background-image: url('/images/products/apel.jfif');">
        
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="products-text">
                                Apel Fuji Sak Super (kg)
                            </div>
                            <div class="products-price text-danger">
                                Rp. 50.000
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="">QTY</label>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">+ Keranjang</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection