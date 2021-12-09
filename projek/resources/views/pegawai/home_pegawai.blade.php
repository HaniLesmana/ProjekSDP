@extends('pegawai.base-layout')
@section('header')
    @include('pegawai.navbarPegawai')
@endsection
@section('main')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<style>
body{
    margin-top:0px;
    background:#FAFAFA;
}
.order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>
{{-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> --}}
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">New Orders</h6>
                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i><span>{{$totalnewdtranssewa}}</span></h2>
                    <p class="m-b-0">Completed Orders<span class="f-right">{{$totaldtranssewa}}</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Chat Received</h6>
                    <h2 class="text-right"><i class="fa fa-comment-o f-left"></i><span>{{$newchat}}</span></h2>
                    <p class="m-b-0">All Chat<span class="f-right">{{$totalchat}}</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">One Month Income</h6>
                    <h2 class="text-right"><i class="fa fa-credit-card f-left"></i><span>+{{$pendapatan_pegawai_per_bulan}}</span></h2>
                    <p class="m-b-0">Income<span class="f-right">{{$pendapatan_pegawai}}</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Rating</h6>
                    <h2 class="text-right"><i class="fa fa-star f-left"></i><span>{{$rata_rating}}</span></h2>
                    <p class="m-b-0">Total Review<span class="f-right">{{$jumlah_review}}</span></p>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection
