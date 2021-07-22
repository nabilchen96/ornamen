@extends('layouts.app')

@section('title')
Store Detail Page
@endsection

@section('content')
<div class="page-content page-details">
    <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Products Details
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="store-gallery" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-10" data-aos="zoom-in">
                    <transition name="slide-fade" mode="out-in">
                        <img :src="photos[activePhoto].url" :key="photos[activePhoto].id" class="w-100 main-image"
                            alt="">
                    </transition>
                </div>
                <div class="col-lg-2">
                    <div class="row">
                        <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id"
                            data-aos="zoom-in" data-aos-delay="100">
                            <a href="#" @click="changeActive(index)">
                                <img :src="photo.url" class="w-100 thumbnail-image"
                                    :class="{ active: index == activePhoto }" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="store-details-container mt-5" data-aos="fade-up">
        <section class="store-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h1>Sofa Ternyaman</h1>
                        <div class="owner">By Nabil Putra</div>
                        <div class="price">$1,409</div>
                    </div>
                    <div class="col-lg-2" data-aos="zoom-in">
                        <a href="/cart.html" class="btn btn-success px-4 text-white btn-block mb-3">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-description">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <p>
                            The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for
                            unimaginable,
                            all-day comfort. There's super breathable fabrics on the upper, while colours add a modern
                            edge.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, aliquid et corporis laborum
                            perspiciatis
                            pariatur architecto aperiam nesciunt id expedita aliquam in sit! Fuga, saepe! Commodi
                            tenetur architecto
                            rerum quibusdam.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-review">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 mt-3 mb-3">
                        <h5>Customer Review (3)</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img src="/images/userpic1.png" class="mr-3 rounded-circle" alt="">
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">
                                        Nabil Putra
                                    </h5>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nostrum delectus
                                    rerum odio
                                    molestias, ipsa illo, cupiditate dolor facilis quaerat debitis numquam tempora quam
                                    perferendis
                                    deserunt ad sunt iusto eaque!
                                </div>
                            </li>
                            <li class="media">
                                <img src="/images/userpic3.png" class="mr-3 rounded-circle" alt="">
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">
                                        Bill Gates
                                    </h5>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nostrum delectus
                                    rerum odio
                                    molestias, ipsa illo, cupiditate dolor facilis quaerat debitis numquam tempora quam
                                    perferendis
                                    deserunt ad sunt iusto eaque!
                                </div>
                            </li>
                            <li class="media">
                                <img src="/images/userpic2.png" class="mr-3 rounded-circle" alt="">
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">
                                        Jeff Bezoss
                                    </h5>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta nostrum delectus
                                    rerum odio
                                    molestias, ipsa illo, cupiditate dolor facilis quaerat debitis numquam tempora quam
                                    perferendis
                                    deserunt ad sunt iusto eaque!
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script>
  var gallery = new Vue({
    el: "#gallery",
    mounted() {
      AOS.init();
    },
    data: {
      activePhoto: 0,
      photos: [
        {
          id: 1,
          url: "/images/products/pic.jpg"
        },
        {
          id: 2,
          url: "/images/products/pic1.jpg"
        },
        {
          id: 3,
          url: "/images/products/pic2.jpg"
        },
        {
          id: 4,
          url: "/images/products/pic3.jpg"
        },
      ]
    },
    methods: {
      changeActive(id) {
        this.activePhoto = id;
      }
    },
  })
</script>
@endpush