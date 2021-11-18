@extends('user.base-layout')
    <!-- Navbar -->
    @section('header')
        @include('user.navbarUser')
    @endsection

    @section('main')
    <style>
        .btnTrans{
            color:white;
        }
        .contItem{
            height:200px;
        }
        .lab{
            height: 20px;
        }
    </style>
    <div class="container">
        <h2>Transaction Page</h2>
        <div class="shadow-lg p-3 mb-5 bg-white rounded">
            <h5>Alamat</h5>
            <hr>
            <label for="">{{$datauser->user_alamat}}</label><label style="font-size:0.5em;color:#03AC0E;background-color:#D6FFDE;margin-left:5px;">Utama</label><br>
            <button class="btn btn-warning btnTrans">Pilih alamat lain</button>

            <hr style="margin-top:30px;">
            <div id="contItems">

                @foreach ($datacart as $cart)
                    <div class="contItem">

                        @foreach ($datapegawai as $peg)
                            @if($cart->pegawai_id==$peg->pegawai_id)
                                <div style="float:left;">
                                    <div class="" style="width: 13rem;">
                                        @if ($peg->pegawai_jasa=="Cleaning")
                                            <img src="{{asset('img/img2.png')}}" class="card-img-top rounded" style="height:11rem;" alt="...">
                                        @else
                                            <img src="{{asset('img/img1.png')}}" class="card-img-top rounded" style="height:11rem;" alt="...">
                                        @endif
                                    </div>
                                </div>
                                <div style="float:left;padding:0px 10px 0px 30px;font-size:18px;">
                                    <b>{{$peg->pegawai_jasa}}</b><br>
                                    <!-- <label for="" class="">Jenis jasa</label><br> -->
                                    <label class="lab">Nama</label><br>
                                    <label class="lab">Alamat</label><br>
                                    <label class="lab">Biaya</label><br>
                                </div>
                                <div style="float:left;padding:0px 10px 0px 30px;font-size:18px;">
                                    <!-- <label for="" >: </label><br> --> <br>
                                    <label class="lab">: {{$peg->pegawai_nama}}</label><br>
                                    <label class="lab">: {{$peg->pegawai_alamat}}</label><br>
                                    <label class="lab">: Rp. 50.000,--</label><br>
                                    <label class="lab">: Rp. 50.000,--</label><br>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>

    <footer>

    </footer>

    <!-- <script type="text/javascript" src="/js/functions.js"></script> -->
    <script>

    </script>
    @endsection
