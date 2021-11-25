@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
@endsection
<!-- Akhir Navbar -->
@section('main')


    <div class="container">
        <div class="section-header" style="text-align:left;">
            <h2>On going</h2>
        </div>


            @csrf
            @foreach ($dtransewa as $key =>$d)
            <div class="shadow-lg" style="display: flex;border-radius:5px;">
                <div class="card" style="float:left;">
                    @if ($d->pegawai->pegawai_jasa=="cleaning")
                    <img src="{{asset('img/img2.png')}}" class="card-img-top" style="height:9rem;width:10rem;">
                    @else
                    <img src="{{asset('img/img1.png')}}" class="card-img-top" style="height:9rem;width:10rem;">
                    @endif
                </div>
                <div class="card-body" style="width:15rem;float:left;">
                    <h5 class="card-title">{{$d->pegawai->pegawai_nama}}</h5>
                    <p class="card-text">{{$d->pegawai->pegawai_telepon}}</p>
                    <p class="card-text">{{$d->pegawai->pegawai_alamat}}</p>
                </div>
                <div class="card-body" style="width:15rem;float:left;display:flex;">
                    <form action="{{ url('/user/detailongoing/'.$d->pegawai->id) }}" method="get">
                        <button type="submit" class="btn btn-success mr-3" name="btndetail">Detail</button>
                    </form>
                    <form action="{{ url('/user/chat/'.$d->pegawai->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-warning" name="btnchat">Chat</button>
                    </form>
                </div>
            </div>
            <hr>
            @endforeach
        </div>
    </div>


@endsection
