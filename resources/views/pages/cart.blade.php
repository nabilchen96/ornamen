@extends('layouts.app')

@push('title')
Store Cart Page
@endpush

@push('addon-style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@endpush

@section('content')
<div class="page-content page-cart">


    <section class="store-cart">
        <div class="container">
            <div class="card">
                @if ($data->isEmpty())
                <h3 class="text-center col-12 mt-4 mb-4">Belum Ada Barang di Keranjang Anda, <br>silahkan berbelanja
                    terlebih dahulu                 <br><br><a href="{{ route('category.index') }}" class="btn btn-success">Halaman Shop</a>
                </h3>
                @else
                    <div class="card-body">
                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-12 table-responsive">
                                <table style="margin-left: 0; margin-right: 0;"
                                    class="table table-borderless table-striped table-cart">
                                    <thead>
                                        <tr>
                                            <td>Gambar</td>
                                            <td>Keterangan Produk</td>
                                            <td>Harga</td>
                                            <td>Jumlah</td>
                                            <td>Total</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; ?>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td><img src="{{ asset('foto_produk') }}/{{ $item->foto_produk }}"
                                                    class="cart-image"></td>
                                            <td>
                                                <div class="product-title">{{ $item->judul_keterangan }}</div>
                                                <div class="product-subtitle">Seller: {{ $item->name }}</div>
                                            </td>
                                            <td>
                                                <div class="product-title">Rp. {{ number_format($item->harga) }}</div>
                                            </td>
                                            <td style="width: 10%">
                                                <div class="product-title text-center">
                                                    {{-- <input type="number" class="form-control" value="{{ $item->jumlah }}">
                                                    --}}
                                                    {{ $item->jumlah }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-title">
                                                    <?php  $total = $total + $item->total_harga; ?>
                                                    Rp. {{ number_format($item->total_harga) }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ url('hapuscart') }}/{{ $item->id_cart }}"
                                                    class="btn btn-remove-cart">Remove</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="4" class="product-title">Biaya Pengiriman</td>
                                            <td class="product-title">Rp. 100,000</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <hr>
                                            </td>
                                            <td>
                                                (+)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="product-title">Total Harga</td>
                                            <td class="product-title">Rp. {{ number_format($total + 100000) }}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            {{--  --}}
                            <div class="col-12 mt-4 form-group">
                                <label for="">Alamat Pengiriman</label>
                                <textarea name="alamat" class="form-control" rows="5"
                                    readonly>{{ auth::user()->alamat }}</textarea>
                                <p class="text-danger">*Lakukan perubahan alamat di halaman profil</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">CheckOut</button>
                    </div>
                @endif
            </div>

            {{-- <br>
            <div class="card">
                <div class="card-body">
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <h2 class="mb-4">Alamat Pengiriman</h2>
                        </div>
                    </div>
                    {{-- <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressOne">Address 1</label>
                                <input type="text" class="form-control" id="addressOne" name="addressOne"
                                    value="Setra Duta Camera">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressTwo">Address 2</label>
                                <input type="text" class="form-control" id="addressTwo" name="addressTwo"
                                    value="Blok B2 No. 34">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="province">Province</label>
                                <select name="province" id="province" class="form-control">
                                    <option value="West Java">West Java</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="city">City</label>
                                <select name="city" id="city" class="form-control">
                                    <option value="Bandung">Bandung</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="postalCode">Postal Code</label>
                                <input type="text" class="form-control" name="postalCode" id="postalCode" value="48512">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="Indonesia">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="addressTwo">Mobile</label>
                                <input type="text" class="form-control" id="mobile" name="mobile"
                                    value="+62 81271449921">
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr>
                            <h2 class="mb-4">Payment Informations</h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-dealy="200">
                        <div class="col-4 col-md-2">
                            <div class="product-title">$10</div>
                            <div class="product-subtitle">Country Tax</div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="product-title">$280</div>
                            <div class="product-subtitle">Product Insurance</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title">$580</div>
                            <div class="product-subtitle">Ship to Jakarta</div>
                        </div>
                        <div class="col-4 col-md-2">
                            <div class="product-title text-success">$580</div>
                            <div class="product-subtitle">Total</div>
                        </div>
                        <div class="col-8 col-md-3">
                            <a href="/success.html" class="btn btn-success mt-4 px-4 btn-block">Chekout Now</a>
                        </div>
                    </div> --}}

            {{-- </div>
            </div> --}}
        </div>
    </section>

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
@endpush