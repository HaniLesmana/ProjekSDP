@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
@endsection
<!-- Akhir Navbar -->
@section('main')
    <div class="container">
        <div class="shadow-lg" style="height: 100px;width:100%;padding:10px;">
            <div style="float:left;">
                <div style="">
                    @if ($pegawai->pegawai_jasa=="Cleaning")
                        <img src="{{asset('img/img2.png')}}" class="card-img-top rounded" style="height:80px;width:80px;border-radius: 50%;object-fit: cover;" alt="...">
                    @else
                        <img src="{{asset('img/img1.png')}}" class="card-img-top rounded" style="height:80px;width:80px;border-radius: 50%;" alt="...">
                    @endif
                </div>
            </div>
            <div style="float:left;padding:8px 0px 0px 30px;font-size:18px;width:140px;">
                <b>{{$pegawai->pegawai_jasa}}</b><br>
                <label class="lab" style="line-height:20px;margin-top:10px;">{{$pegawai->pegawai_nama}}</label><br>

            </div>
        </div>
    </div>


@endsection
