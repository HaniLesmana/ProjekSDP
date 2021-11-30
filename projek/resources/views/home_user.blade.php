@extends('user.base-layout')

    {{-- LOGIN SUCCESS --}}
    @if (session("welcomeUser"))
        <script>
            alert("{{ session('welcomeUser') }}");
        </script>
    @endif

    <!-- Navbar -->
    @section("header")
        @include('user.navbarUser')
    @endsection
    <!-- Akhir Navbar -->
@section('main')

    <!-- Jumbotron -->
    <div style="height:10px;"></div>
    <div class="container mb-3" style="padding-left:30px;">
        <div class="row align-items-center" style="height: 400px;width: 101%;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block img-fluid ads" src="{{asset('img/iklan1.png')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid ads" src="{{asset('img/iklan2.png')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid ads" src="{{asset('img/iklan3.png')}}" alt="Third slide">
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Akhir jumbotron -->

    <!-- Container -->
    <div class="container ">
        <!-- bagian Work like at home -->
        <div class="row mr-5">
            <div class="col-lg" style="border-radius:12px;box-shadow: rgb(49 53 59 / 12%) 0px 1px 6px 0px;font-family:Nunito Sans, -apple-system, sans-serif;">
            {{-- <img src="../img/workingspace.png" alt="workingspace" class="img-fluid"> --}}
                <div class="col-sm-6" style="border-radius:5px;float:left;">
                    <label for="" style="font-size: 1.7rem;border-radius: 12px;color: rgba(49, 53, 59, 0.68);">Saldo</label>
                </div>
                <div class="col-sm-6" style="float: left;padding-left:67.5px;text-align:center;position:center;">
                    <form action="{{ url('/user/topUp')}}" method="GET">
                        <button type="submit" class="btn btn align-bottom" style="color:white;outline:none;box-shadow:none;width:150px;background-color:#d9a73d">Top Up</button><br>
                    </form>
                {{-- <a href="/user/topUp" class="btn btn-primary stretched-link" style="color:white;outline:none;box-shadow:none;width:150px;background-color:#d9a73d">Top Up</a> <br> --}}

                </div>
                <div style="clear:both"></div>
                <div class="col-sm-6" style="background-color:lightgray;float:left;border-radius: 5px;">
                    <label for="" style="font-size: 1.2rem;color: rgba(49, 53, 59, 0.68);font-family:Nunito Sans, -apple-system, sans-serif;">Rp.{{ $saldo }}</label>
                </div>
                <div class="col-sm-6" style="float: left;padding-left:67.5px;text-align:center;">
                    <form action="{{ url('/user/topUp')}}" method="get">
                        <button type="submit" class="btn btn align-middle" style="color:white;outline:none;box-shadow:none;width:150px;background-color:#d9a73d">Withdraw</button>
                    </form>
                    {{-- <a href="/user/withdraw" class="btn btn-primary stretched-link" style="color:white;outline:none;box-shadow:none;width:150px;background-color:#d9a73d">Withdraw</a> <br> --}}

                </div>
            </div>
      </div>

      </div>
    </div>
    <!-- akhir container -->


    <!-- NEW TEMPLATE -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="{{asset('css/userhome/bootstrap.min.css')}}"> -->

    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="{{asset('css/userhome/font-awesome.min.css')}}"> -->

    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="{{asset('css/userhome/owl.carousel.css')}}"> -->
    <link rel="stylesheet" href="{{asset('css/userhome/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/userhome/style2.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/userhome/responsive.css')}}"> -->


    <div class="block-header">
        <h3 class="block-header__title">Featured Products</h3>
        <div class="block-header__divider"></div>
        <ul class="block-header__groups-list">
            <li><button type="button" id="button_cleaning" class="block-header__group block-header__group--active">Cleaning</button></li>
            <li><button type="button" id="button_painting" class="block-header__group">Painting</button></li>
            <li><button type="button" id="button_plumbing" class="block-header__group">Plumbing</button></li>
            <li><button type="button" id="button_electrical" class="block-header__group">Electrical</button></li>
            <li><button type="button" id="button_repair" class="block-header__group">Repair</button></li>
        </ul>
        <div class="block-header__arrows-list">
        </div>
    </div>


    <!-- Start promo area -->
    <!-- <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-6" id="button_all">
                    <div class="single-promo promo1">
                        <img src="{{asset('img/household.png')}}" style="height=50px;width:100px;">
                        <p>All</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6" id="button_cleaning">
                    <div class="single-promo promo2">
                        <img src="{{asset('img/household.png')}}" style="height=50px;width:100px;">
                        <p>Cleaning</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6" id="button_painting">
                    <div class="single-promo promo3">
                        <img src="{{asset('img/paint-roller.png')}}" style="height=50px;width:100px;">
                        <p>Painting</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6" id="button_plumbing">
                    <div class="single-promo promo4">
                        <img src="{{asset('img/plumbing.png')}}" style="height=50px;width:100px;">
                        <p>Plumbing</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6" id="button_electrical">
                    <div class="single-promo promo5">
                        <img src="{{asset('img/listrik.png')}}" style="height=50px;width:100px;">
                        <p>Electrical</p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6" id="button_repair">
                    <div class="single-promo promo6">
                        <img src="{{asset('img/tools.png')}}" style="height=50px;width:100px;">
                        <p>Repair</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End promo area -->

    <!-- Start main content area -->
    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="latest-product">
                        <div class="product-carousel" id="daftar" style="margin-top:-30px;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End main content area -->



    <!-- Latest jQuery form server -->
    <!-- <script src="https://code.jquery.com/jquery.min.js"></script> -->

    <!-- Bootstrap JS form CDN -->
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

    <!-- jQuery sticky menu -->
    <!-- <script src="{{asset('js/userhome/owl.carousel.min.js')}}"></script> -->
    <!-- <script src="{{asset('js/userhome/jquery.sticky.js')}}"></script> -->

    <!-- jQuery easing -->
    <!-- <script src="{{asset('js/userhome/jquery.easing.1.3.min.js')}}"></script> -->

    <!-- Main Script -->
    <script src="{{asset('js/userhome/main.js')}}"></script>

    <!-- Slider -->
    <!-- <script type="text/javascript" src="{{asset('js/userhome/bxslider.min.js')}}"></script> -->
    <!-- <script type="text/javascript" src="{{asset('js/userhome/script.slider.js')}}"></script> -->

    <!-- NEW TEMPLATE -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}

    <script>
        $(document).ready(function() {


            $("#button_cleaning").click(function(){
                // $("#button_art").css("background-color","#d9a73d");
                // $("#button_tukang").css("background-color","lightgray");
                 $.ajax({
                    type: 'get',
                    url: 'ajax/Cleaning',
                    success: function(data) {
                        $("#daftar").empty();
                        $("#daftar").append(data);
                        removeSelectedMenu();
                        $("#button_cleaning").addClass('block-header__group--active');
                    }
                     // $("#daftar").empty();
                     // $("#daftar").append(data);

                });
            });
            $("#button_painting").click(function(){
                // $("#button_tukang").css("background-color","#d9a73d");
                // $("#button_art").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/Painting',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                    removeSelectedMenu();
                    $("#button_painting").addClass('block-header__group--active');
                }
            });
            });
            $("#button_plumbing").click(function(){
                // $("#button_tukang").css("background-color","#d9a73d");
                // $("#button_art").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/Plumbing',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                    removeSelectedMenu();
                    $("#button_plumbing").addClass('block-header__group--active');
                }
            });
            });
            $("#button_electrical").click(function(){
                // $("#button_tukang").css("background-color","#d9a73d");
                // $("#button_art").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/Electrical',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                    removeSelectedMenu();
                    $("#button_electrical").addClass('block-header__group--active');
                }
            });
            });
            $("#button_repair").click(function(){
                // $("#button_tukang").css("background-color","#d9a73d");
                // $("#button_art").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/Repair',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                    removeSelectedMenu();
                    $("#button_repair").addClass('block-header__group--active');
                }
            });
            });

            $("#button_cleaning").trigger("click");
        });

        function removeSelectedMenu() {
            $("#button_cleaning").removeClass('block-header__group--active');
            $("#button_painting").removeClass('block-header__group--active');
            $("#button_plumbing").removeClass('block-header__group--active');
            $("#button_electrical").removeClass('block-header__group--active');
            $("#button_repair").removeClass('block-header__group--active');
        }
    </script>

@endsection
