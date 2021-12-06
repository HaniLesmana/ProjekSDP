@extends('user.base-layout')
<!-- Navbar -->
@section('header')
    @include('user.navbarUser')
@endsection
<!-- Akhir Navbar -->
@section('main')
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/> -->
    <!-- Slick -->
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('css/detailcart/slick.css')}}"/> -->
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('css/detailcart/slick-theme.css')}}"/> -->
    <!-- nouislider -->
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('css/detailcart/nouislider.min.css')}}"/> -->

    <!-- Font Awesome Icon -->
    <!-- <link rel="stylesheet" href="{{asset('css/detailcart/font-awesome.min.css')}}"> -->

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('css/detailcart/style.css')}}"/>
    <!-- Css Styles -->
    {{-- <link rel="stylesheet" href="{{asset('style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/detailcart/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/detailcart/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/detailcart/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/detailcart/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/detailcart/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/detailcart/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/detailcart/slicknav.min.css')}}" type="text/css"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/detailcart/style.css')}}" type="text/css"> --}} -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <style>
        .btnTrans{
            color:white;
        }
        .fa-shopping-cart:before{
            content:"\f07a"

        }
        [type="date"] {
            background:#fff url('https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png')  97% 50% no-repeat ;
        }
        [type="date"]::-webkit-inner-spin-button {
            display: none;
        }
        [type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0;
        }
        label {
            display: block;
        }
        /* input {
            border: 1px solid #c4c4c4;
            border-radius: 5px;
            background-color: #fff;
            padding: 3px 5px;
            box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
            width: 190px;
            float:right;
        } */
    </style>

    <div class="container">
        @if (Session::has('msg'))
            <div class="alert alert-warning" role="alert">
            {{ session('msg'); }}
            </div>
        @endif
        <div class="section-header" style="text-align:left;margin-left:15px;margin-top:10px;margin-bottom:10px;">
            <h2>{{ $pegawai->pegawai_jasa }}</h2>
        </div>
        {{-- <label style="color:gray;font-size:35px;font-weight:semibold;margin-left:15px;">{{ $pegawai->pegawai_jasa }}</label> --}}
        <form action="{{ url('/user/dosavedetailcart') }}" method="post">
            @csrf
            <div id="contPeg" style="margin-left:15px;">
                <div style="float:left;">

                    @if($pegawai->pegawai_photo=="" || $pegawai->pegawai_photo==null)
                        <img src="{{asset('/img/profile.png')}}" class="card-img-top" style="height=50px;width:100px;" alt="...">
                    @else
                        <img src="{{asset('/storage/photos/'.$pegawai->pegawai_photo)}}" class="card-img-top" style="height=50px;width:100px;" alt="...">
                    @endif

                </div>
                <div style="float:left;margin-left:10px;">
                    Nama <br>
                    Alamat <br>
                </div>
                <div style="float:left;margin-left:5px;">
                    : {{ $pegawai->pegawai_nama }}<br>
                    : {{ $pegawai->pegawai_alamat }}<br>
                </div>
                <input type="hidden" name="idpegawai" value="{{$pegawai->id}}">
                <div class="btn btn-warning btnTrans" style="float:right;">
                    <input type="hidden" name="idpegawai" value="{{ $pegawai->id }}">
                    <button type="submit">Add to Cart</button>
                </div>
                <div style="clear:both"></div>

                <div style="margin-top:30px;margin-bottom:50px;">
                    <div class="shadow-lg" style="padding:20px;width:49.5%;float:left;margin-right:10px;border-radius:0px;pading:20px;">
                        <label for="tanggal">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ $user->user_alamat }}" readonly>
                        <a href="" data-target="#pilihalamat" data-toggle="modal">
                            <button class="btn btn-warning btnTrans" data-target="#pilihalamat" data-toggle="modal" id="alamatlain">
                                Pilih alamat lain
                            </button>
                        </a>
                    </div>
                    <div class="shadow-lg" style="padding:20px;height:99px;width:49.5%;float:left;border-radius:0px;">
                        <label for="tanggal">Tanggal Sewa</label>
                        <input type="date" name="tanggal" id="tanggal">
                    </div>
                </div>
                <div style="clear:both"></div>

            </div>
        </form>

        <hr>

        <div id="contAddOn">
            <div class="section-header" style="text-align:left;margin-left:15px;">
                <h2>Add On</h2>
                <div class="new-arrivals-content" style="margin-top:20px;">
                    <div class="row">
                        @foreach($addons as $key => $addon)
                            <div class="col-md-3 col-sm-4">
                                <div class="single-new-arrival">
                                    <div class="single-new-arrival-bg">

                                        {{-- Gambar barang --}}
                                        <img src="{{asset('img/sapu.png')}}" alt="new-arrivals images" style="object-fit:fill;">

                                        <div class="single-new-arrival-bg-overlay"></div>

                                        {{-- BTN ADD TO CART --}}
                                        <div class="new-arrival-cart" >
                                            <p>
                                                <span class="lnr lnr-cart"></span>
                                                <button data-toggle="modal" data-target="#modalEditAddOn{{$addon['id']}}" style="color:white;">Edit</button>

                                            </p>
                                            <p class="arrival-review pull-right">
                                                <span class="lnr lnr-heart"></span>
                                                <span class="lnr lnr-frame-expand"></span>
                                            </p>
                                        </div>
                                    </div>
                                    <h4><a href="#">{{ $addon['barang_nama'] }}</a></h4>
                                    <p class="arrival-product-price">
                                        Rp.{{ $addon['barang_harga'] }} x {{ $addon['jumlah']}}

                                    </p>
                                    <a href="{{ url('user/doremoveaddon/'.$addon['id'].'/'.$pegawai->id) }}">&nbsp;&nbsp;&nbsp;<button data-toggle="modal" data-target="#modalEditAddOn{{$addon['id']}}" style="color:red; font-size:15px;font-weight:normal;margin-top:9px;margin-left:-10px;">Remove</button></a>

                                </div>
                            </div>

                            {{-- MODAL INPUT STOCK --}}
                            <div class="modal fade bd-example-modal-sm" id="modalEditAddOn{{$addon['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{ url('/user/doeditaddon') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $addon['barang_nama'] }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body" style="color:black;">
                                                Jumlah :
                                                <?php
                                                    $brg = [];
                                                    foreach ($databarang as $barang) {
                                                        if($barang->id == $addon['id']){
                                                            $brg = $barang;
                                                        }
                                                    }
                                                ?>
                                                <select name="jumlah" id="" class="form-select" aria-label="Default select example">
                                                    @for($i = 1; $i <= ($brg->barang_stok); $i++)
                                                        @if($i == $addon['jumlah'])
                                                            <option value="{{$i}}" selected>{{$i}}</option>
                                                        @else
                                                            <option value="{{$i}}">{{$i}}</option>
                                                        @endif

                                                    @endfor
                                                </select>
                                                <input type="hidden" name="id" value="{{ $addon['id'] }}">
                                                <input type="hidden" name="idpegawai" value="{{ $pegawai->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="btnAdd" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- MODAL INPUT STOCK --}}

                        @endforeach
                    </div>
                </div>

            </div>
        </div>

        <hr>

        <div id="contBarang">
            <div class="container" style="margin-left:0px;margin-right:0px;">
                <div class="section-header" style="text-align:left;">
                    <h2>Barang</h2>
                </div><!--/.section-header-->
                <div class="new-arrivals-content" style="margin-top:20px;">
                    <div class="row">
                        @foreach($databarang as $key => $barang)
                            <div class="col-md-3 col-sm-4">
                                <div class="single-new-arrival">
                                    <div class="single-new-arrival-bg">

                                        @php
                                            $addon = null;
                                            foreach ($addons as $key => $addon1) {
                                                if($addon1['id'] == $barang->id){
                                                    $addon = $addon1;
                                                }
                                            }
                                        @endphp

                                        {{-- Gambar barang --}}
                                        <img src="{{asset('img/sapu.png')}}" alt="new-arrivals images" style="object-fit:fill;">

                                        <div class="single-new-arrival-bg-overlay"></div>
                                        @if($addon != null)
                                            <div class="sale bg-1">
                                                <p>In Cart</p>
                                            </div>
                                        @elseif($barang->barang_stok > 0)
                                            <div class="sale bg-2">
                                                <p>In Stock</p>
                                            </div>
                                        @else
                                            <div class="sale bg-1" style="width:92px;background-color:gray;">
                                                <p>Out of Stock</p>
                                            </div>
                                        @endif

                                        {{-- BTN ADD TO CART --}}
                                        @if($addon == null)
                                            <div class="new-arrival-cart" >
                                                <p>
                                                    <span class="lnr lnr-cart"></span>
                                                    <button id="B{{$barang->id}}" data-toggle="modal" data-target="#modalAddOn{{$barang->id}}" style="color:white;">Add <span> to </span> Cart</button>
                                                </p>
                                                <p class="arrival-review pull-right">
                                                    <span class="lnr lnr-heart"></span>
                                                    <span class="lnr lnr-frame-expand"></span>
                                                </p>
                                            </div>
                                        @endif


                                    </div>
                                    <h4><a href="#">{{ $barang->barang_nama }}</a></h4>
                                    <p class="arrival-product-price">Rp.{{ $barang->barang_harga }}</p>
                                </div>
                            </div>

                            {{-- MODAL INPUT STOCK --}}
                            <div class="modal fade bd-example-modal-sm" id="modalAddOn{{$barang->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <form method="post" action="{{ url('/user/dotambahaddon') }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add {{ $barang->barang_nama }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <div class="modal-body" style="color:black;">
                                                Jumlah :
                                                <select name="jumlah" id="" class="form-select" aria-label="Default select example">
                                                    @if($barang->barang_stok > 0)
                                                        @if($addon != null)
                                                            @for($i = 1; $i <= $barang->barang_stok - $addon['jumlah']; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        @else
                                                            @for($i = 1; $i <= $barang->barang_stok; $i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor
                                                        @endif
                                                    @else
                                                        <option value="null">Out of Stock</option>
                                                    @endif

                                                </select>
                                                <input type="hidden" name="id" value="{{ $barang->id }}">
                                                <input type="hidden" name="idpegawai" value="{{ $pegawai->id }}">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                @if($barang->barang_stok > 0)
                                                    <button type="submit" name="btnAdd" class="btn btn-primary">Add</button>
                                                @else
                                                    <button type="submit" name="btnAdd" class="btn btn-secondary" disabled>Out of Stock</button>
                                                @endif

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- MODAL INPUT STOCK --}}


                        @endforeach

                    </div>
                </div>
            </div><!--/.container-->
        </div>

    </div>

    <script type="text/javascript" src="/js/functions.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Include all js compiled plugins (below), or include individual files as needed -->
    <script src="{{asset('js/detailcart/jquery.js')}}"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="{{asset('/js/detailcart/bootstrap.min.js')}}"></script>

    <!-- bootsnav js -->
    <script src="{{asset('/js/detailcart/bootsnav.js')}}"></script>

    <!--owl.carousel.js-->
    <script src="{{asset('js/detailcart/owl.carousel.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!--Custom JS-->
    <script src="{{asset('js/detailcart/custom.js')}}"></script>

    <!-- Date picker -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#alamatlain').click(function(){
                $('#alamat').prop('readonly',false);
            });
        });
    </script>
@endsection
