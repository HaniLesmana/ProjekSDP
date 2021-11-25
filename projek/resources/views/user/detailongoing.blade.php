@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
@endsection
<!-- Akhir Navbar -->
@section('main')


    <div class="container">
        <div class="section-header" style="text-align:left;">
            <h2>Detail on going</h2>
        </div>
        <div class="">
            <div class="card">
                <h5 class="card-title">{{$dtransewa->pegawai->pegawai_nama}}</h5>
                <p class="card-text">Alamat:{{$dtransewa->pegawai->pegawai_alamat}}</p>
                <p class="card-text">Telepon:{{$dtransewa->pegawai->pegawai_telepon}}</p>
                <p class="card-text">Jasa:{{$dtransewa->pegawai->pegawai_jasa}}</p>
                {{-- <input type="text" name="" class="form-control" id="" value="{{$dtransewa->pegawai->pegawai_nama}}" readonly>
                <input type="text" name="" class="form-control" id="" value="{{$dtransewa->pegawai->pegawai_alamat}}" readonly>
                <input type="text" name="" class="form-control" id="" value="{{$dtransewa->pegawai->pegawai_telepon}}" readonly>
                <input type="text" name="" class="form-control" id="" value="{{$dtransewa->pegawai->pegawai_jasa}}" readonly> --}}
            </div>
        </div>
        <div class="card">
            <table class="table table-striped">
                <thead style="background-color:#E8D0B3;">
                {{-- <thead style="background-color:black;color:white;"> --}}
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                    @if(isset($dtransbarang))
                        @foreach ($dtransbarang as $i=> $dbarang)
                        {{-- @for($i = 0; $i < count($barang); $i++) --}}
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $dbarang->barang->barang_nama }}</td>
                                <td>{{ $dbarang->barang->kategori->kategori_nama }}</td>
                                <td>{{ $dbarang->barang->barang_harga }}</td>
                                <td>{{ $dbarang->barang_jumlah}}</td>
                            </tr>
                        @endforeach
                    @endif

        </div>
    </div>


@endsection
