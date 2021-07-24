@extends('layouts.app')

@section('title')
Store Category Page
@endsection

@push('addon-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@endpush

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
                @foreach ($produk as $k => $produk)
                <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="#" data-target=".modal" data-toggle="modal" data-array="{{ $produk }}"
                        class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                                style="background-image: url('{{ asset('foto_produk') }}/{{ $produk->foto_produk }}');">

                            </div>
                        </div>
                        <div class="products-text">
                            {{ $produk->judul_keterangan }}
                        </div>
                        <div class="products-price">
                            Rp. {{ number_format($produk->harga) }}
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formtemplate" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="#" class="component-products d-block">
                                    <div class="products-thumbnail">
                                        <div class="products-image" id="gambar"
                                            style="background-image: url('/images/products/apel.jfif');">

                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-6">
                                <div class="products-text" id="judul_keterangan">

                                </div>
                                <div class="products-price text-danger" id="harga">

                                </div>
                                <div class="products-price text-danger" id="stok">

                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="">QTY</label>
                                    <input type="number" name="jumlah" class="form-control">
                                </div>
                                <input type="hidden" name="id_jual_hasil" id="id_jual_hasil">
                                <input type="hidden" name="harga" id="harga_var">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @if (auth::check())
                        <button type="submit" class="btn btn-success">+ Keranjang</button>
                        @else
                        <a ref="{{ route('login') }}" class="btn btn-success text-white">Login untuk membeli</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
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
</script>
<script>
    $('.modal').on('show.bs.modal', function (event) {
      var button  = $(event.relatedTarget)
      var data    = button.data('array');
      var modal   = $(this)

      if(data){
        $('#formtemplate').attr('action', "{{ url('simpancart') }}").trigger('reset')

        modal.find('#judul_keterangan').html(data.judul_keterangan)
        modal.find('#harga').html('Rp. '+Intl.NumberFormat().format(data.harga)+' per '+data.ukuran_jual)
        modal.find('#stok').html('Stok Tersisa: '+data.stok+' '+data.ukuran_jual)
        modal.find('#gambar').css('background-image', 'url("{{ asset("foto_produk") }}/'+data.foto_produk+'")')
        modal.find('#id_jual_hasil').val(data.id_jual_hasil)
        modal.find('#harga_var').val(data.harga)
      }
    })
</script>

@endpush