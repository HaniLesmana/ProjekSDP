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
    <div class="container mb-3">
        <div class="row align-items-center" style="height: 400px;width: 100%;">
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
        <div class="row mr-5" style="width:1130px;">
            <div class="col-lg" style="border-radius:12px;box-shadow: rgb(49 53 59 / 12%) 0px 1px 6px 0px;font-family:Nunito Sans, -apple-system, sans-serif;">
            {{-- <img src="../img/workingspace.png" alt="workingspace" class="img-fluid"> --}}
                <div class="col-sm-6" style="border-radius:5px;float:left;">
                    <label for="" style="font-size: 1.7rem;border-radius: 12px;color: rgba(49, 53, 59, 0.68);">Saldo</label>
                </div>
                <div class="col-lg-6" style="float: left;padding-left:67.5px;">
                <a href="/user/topUp" class="btn btn-primary stretched-link" style="color:white;outline:none;box-shadow:none;width:150px;background-color:#d9a73d">Top Up</a> <br>
                    <!-- <button type="submit" class="btn btn-lg mb-1 align-bottom" style="color:white;outline:none;box-shadow:none;width:150px;background-color:#d9a73d">Top Up</button><br> -->
                </div>
                <div style="clear:both"></div>
                <div class="col-sm-6" style="background-color:lightgray;float:left;border-radius: 5px;">
                    <label for="" style="font-size: 1.2rem;color: rgba(49, 53, 59, 0.68);font-family:Nunito Sans, -apple-system, sans-serif;">Rp.{{ $saldo }}</label>
                </div>
                <div class="col-sm-6" style="float: left;padding-left:67.5px;">
                    <button type="submit" class="btn btn-lg align-middle" style="color:white;outline:none;box-shadow:none;width:150px;background-color:#d9a73d">Withdraw</button>
                </div>
            </div>
        <div class="col-xl" style="padding:0px;">
            {{-- <button type="submit" class="align-middle button_ajax" onMouseOver="this.style.backgroundColor='#d9a73d';this.style.color='#d9a73d';" onMouseOut="" id="button_art" style=""> --}}
            <button type="submit" class="btn align-middle button_ajax" onMouseOver="this.style.backgroundColor='#d9a73d';this.style.border='2px solid #d9a73d';this.style.color='white';" onMouseOut="this.style.backgroundColor='lightgray';this.style.border='none';this.style.color='gray';" id="button_art" style="outline:none;box-shadow: none;border-radius:10px; width: 252px;">
                <img src="{{asset('img/art.png')}}" style="height=50px;width:100px;">ART
            </button>
            <button type="submit" class="btn align-middle button_ajax" onMouseOver="this.style.backgroundColor='#d9a73d';this.style.border='2px solid #d9a73d';this.style.color='white';" onMouseOut="this.style.backgroundColor='lightgray';this.style.border='none';this.style.color='gray';" id="button_tukang" style="outline:none;box-shadow:none;border-radius:10px;margin-left:10px;">
                <img src="{{asset('img/worker.png')}}" style="height=50px;width:100px;">Tukang
            </button>

          {{-- <h2>You <b>Work</b> Like at <b>Home</b></h2>
          <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya</p>
          <a class="nav-item btn btn-primary tombol" href="#">GALLERY</a> --}}
        </div>
      </div>
      <!-- Akhir work like at home -->

      {{-- <a id="About">About</a> --}}
        <div class="row mt-3" style="border:2px solid white;border-radius:5px;width:1110px;" id="daftar" >

        </div>
    </div>
    <!-- akhir container -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#button_art").click(function(){
                // $("#button_art").css("background-color","#d9a73d");
                // $("#button_tukang").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/{art}',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                }
            });
            });
            $("#button_tukang").click(function(){
                // $("#button_tukang").css("background-color","#d9a73d");
                // $("#button_art").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/{tukang}',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                }
            });
            });
        });
    </script>

@endsection
