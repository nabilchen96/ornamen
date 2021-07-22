@extends('layouts.dashboard')

@section('title')
Store Dashboard Transaction Detail
@endsection

@section('content')
<div class="section-content section-dashbaord-home" data-aos="fade-up">
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">
          #STORE3489
        </h2>
        <p class="dashboard-subtitle">
          Transactions / Details
        </p>
      </div>
      <div class="dashboard-content" id="transactionDetails">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12 col-md-4">
                    <img src="/images/products/pic1.jpg" class="w-100 mb-3" alt="">
                  </div>
                  <div class="col-12 col-md-8">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Customer Name
                        </div>
                        <div class="product-subtitle">
                          Nabil Putra
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Product Name
                        </div>
                        <div class="product-subtitle">
                          Sirup Marzan
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Date of Transaction
                        </div>
                        <div class="product-subtitle">
                          12 januari 2020
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Payment Status
                        </div>
                        <div class="product-subtitle">
                          Pending
                        </div>
                      </div> 
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Total Amount
                        </div>
                        <div class="product-subtitle">
                          $280,90
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Mobile
                        </div>
                        <div class="product-subtitle">
                          +8281271449921
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12 mt-4">
                    <h5>Shipping Information</h5>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Address I
                        </div>
                        <div class="product-subtitle">
                          Palembang
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Address II
                        </div>
                        <div class="product-subtitle">
                          Palembang
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                            Province
                        </div>
                        <div class="product-subtitle">
                          Sumatera Selatan
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                            City
                        </div>
                        <div class="product-subtitle">
                          Palembang
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                          Postal Code
                        </div>
                        <div class="product-subtitle">
                          89675
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">
                            Country
                        </div>
                        <div class="product-subtitle">
                          Indonesia
                        </div>
                      </div>
                      <div class="col-12 col-md-3">
                        <div class="product-title">
                          Shipping Status
                        </div>
                        <select name="status" id="status" class="form-control" v-model="status">
                          <option value="PENDING">Pending</option>
                          <option value="SHIPPING">Shipping</option>
                          <option value="SUCCESS">Success</option>
                        </select>
                      </div>
                      <template v-if="status == 'SHIPPING'">
                        <div class="col-md-3">
                          <div class="product-title">Input Resi</div>
                          <input type="text" name="resi" v-model="resi" class="form-control">
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-success btn-block mt-4">Update Resi</button>
                        </div>
                      </template>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12 text-right">
                      <button type="submit" class="btn btn-success btn-lg mt-4">Save Now</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('addon-script')
<script src="{{ asset('vendor/vue/vue.js') }}"></script>
<script>
  var transactionDetails = new Vue({
    el: '#transactionDetails',
    data:{
      status: "SHIPPING",
      resi: "BDO1203289"
    }
  })
</script>
@endpush