@extends('layouts.app')

@section('title')
Store Category Page
@endsection

@section('content')
<div class="page-content page-home">

    <section class="mt-3">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <h5 class="bg-success mb-4"
                            style="width: fit-content; padding: 10px; border-radius: 50px; color:white;">Send Message</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="padding-left: 30px; padding-right: 30px;">
            <div class="row">
                <div class="col-lg-12" style="background: #f4f4f4; width: 100%; margin: auto; border-radius: 15px; padding: 20px;">
                    <div class="row">
                        <div class="col-lg-6" style="border-radius: 15px;">
                            <img src="/images/profile.png" style="border-radius: 15px;" class="w-100" alt="">
                        </div>
                        <div class="col-lg-6">
                            <p class="text-primary">
                                Leave a Comment
                                your email address will not be published.
                                Required fields are marked
                            </p>
                            <div class="form-group">
                                <input type="text" style="border-radius: 15px; background: white;" class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <input type="email" style="border-radius: 15px; background: white;" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea name="" id="" style="border-radius: 15px; background: white;" cols="30" rows="6" class="form-control">Isi Pesan</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Kirim</button>
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
                        style="width: fit-content; padding: 10px; border-radius: 50px; color:white;">Our Contacts</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/social/001-facebook.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Facebook
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="images/social/003-whatsapp.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Whatsapp
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/social/008-youtube.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Youtube
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/social/011-instagram.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Instagram
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/social/013-twitter.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Twitter
                        </p>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="component-categories d-block">
                        <div class="categories-image">
                            <img src="/images/social/016-tik-tok.png" alt="" class="w-100">
                        </div>
                        <p class="categories-text">
                            Tiktok
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="bg-success mb-4"
                        style="width: fit-content; padding: 10px; border-radius: 50px; color:white;">About Us</h5>
                </div>
            </div>
        </div>
        <div class="container" style="padding-left: 30px; padding-right: 30px;">
            <div class="row">
                <div class="col-lg-12"
                    style="background: #f4f4f4; width: 100%; margin: auto; border-radius: 15px; padding: 20px;">
                    <div class="row">
                        <div class="col-lg-6" style="border-radius: 15px;">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127504.44544255687!2d104.6929234868251!3d-2.9547949049961937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75e8fc27a3e3%3A0x3039d80b220d0c0!2sPalembang%2C%20Kota%20Palembang%2C%20Sumatera%20Selatan!5e0!3m2!1sid!2sid!4v1626235147517!5m2!1sid!2sid"
                                width="100%" height="100%" style="border-radius: 15px; border: none;" ></iframe>
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