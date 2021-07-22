@extends('layouts.dashboard')

@section('title')
Store Dashboard
@endsection

@section('content')
<div class="section-content section-dashbaord-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">
                Dashboard
            </h2>
            <p class="dashboard-subtitle">
                Look what you have made today!
            </p>
        </div>
        <div class="dashbaord-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Customer
                            </div>
                            <div class="dashboard-card-subtitle">
                                15,209
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Revenue
                            </div>
                            <div class="dashboard-card-subtitle">
                                $931,290
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Transaction
                            </div>
                            <div class="dashboard-card-subtitle">
                                22,409.399
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 mt-2">
                    <h5 class="mb-3">Recent Transaction</h5>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/recent-transaction/image.png" alt="">
                                </div>
                                <div class="col-md-4">
                                    Sirup Marjan
                                </div>
                                <div class="col-md-3">
                                    Bill Gates
                                </div>
                                <div class="col-md-3">
                                    12 Januari, 2020
                                </div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/expand_more_24px.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/recent-transaction/image2.png" alt="">
                                </div>
                                <div class="col-md-4">
                                    Sirup Marjan
                                </div>
                                <div class="col-md-3">
                                    Bill Gates
                                </div>
                                <div class="col-md-3">
                                    12 Januari, 2020
                                </div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/expand_more_24px.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="/dashboard-transactions-details.html" class="card card-list d-block">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1">
                                    <img src="/images/recent-transaction/image1.png" alt="">
                                </div>
                                <div class="col-md-4">
                                    Sirup Marjan
                                </div>
                                <div class="col-md-3">
                                    Bill Gates
                                </div>
                                <div class="col-md-3">
                                    12 Januari, 2020
                                </div>
                                <div class="col-md-1 d-none d-md-block">
                                    <img src="/images/expand_more_24px.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection