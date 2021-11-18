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
      <div class="container2" style="margin-top: 30px; border-radius:12px;box-shadow: rgb(49 53 59 / 12%) 0px 1px 6px 0px;height:160px; width:1110px; padding:7px 5px 0 5px;">
        <div class="row">
          <div class="col-sm">
            <button type="submit" class="btn align-middle button_ajax" onMouseOver="this.style.color='white';" onMouseOut="this.style.background-Color=rgba(0, 0, 0, 0);this.style.border='none';this.style.color='black';" id="button_art" style="outline:none;box-shadow:none;width:100%;height:100%;background-color: #d9a73d;">
                <img src="{{asset('img/household.png')}}" style="height=50px;width:100px;"> <br>
                <label>Cleaning</label>
            </button>
          </div>
          <div class="col-sm">
            <button type="submit" class="btn align-middle button_ajax" onMouseOver="this.style.color='white';" onMouseOut="this.style.background-Color=rgba(0, 0, 0, 0);this.style.border='none';this.style.color='black';" id="button_art1" style="outline:none;box-shadow:none;width:100%;height:100%;background-color: #d9a73d;">
                <img src="{{asset('img/paint-roller.png')}}" style="height=50px;width:100px;"> <br>
                <label>Painting</label>
            </button>
          </div>
          <div class="col-sm">
            <button type="submit" class="btn align-middle button_ajax" onMouseOver="this.style.color='white';" onMouseOut="this.style.background-Color=rgba(0, 0, 0, 0);this.style.border='none';this.style.color='black';" id="button_art2" style="outline:none;box-shadow:none;width:100%;height:100%;background-color: #d9a73d;">
                <img src="{{asset('img/plumbing.png')}}" style="height=50px;width:100px;"> <br>
                <label>Plumbing</label>
            </button>
          </div>
          <div class="col-sm">
            <button type="submit" class="btn align-middle button_ajax" onMouseOver="this.style.color='white';" onMouseOut="this.style.background-Color=rgba(0, 0, 0, 0);this.style.border='none';this.style.color='black';" id="button_art3" style="outline:none;box-shadow:none;width:100%;height:100%;background-color: #d9a73d;">
                <img src="{{asset('img/listrik.png')}}" style="height=50px;width:100px;"> <br>
                <label>Electrical</label>
            </button>
          </div>
          <div class="col-sm">
            <button type="submit" class="btn align-middle button_ajax" onMouseOver="this.style.color='white';" onMouseOut="this.style.background-Color=rgba(0, 0, 0, 0);this.style.border='none';this.style.color='black';" id="button_art4" style="outline:none;box-shadow:none;width:100%;height:100%;background-color: #d9a73d;">
                <img src="{{asset('img/tools.png')}}" style="height=50px;width:100px;"> <br>
                <label>Repair etc</label>
            </button>
          </div>
        </div>
      </div>
      <div id="daftar">

      </div>
    </div>
    <!-- akhir container -->



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
            $("#button_art").click(function(){
                // $("#button_art").css("background-color","#d9a73d");
                // $("#button_tukang").css("background-color","lightgray");
                 $.ajax({
                    type: 'get',
                    url: 'ajax/art',
                    success: function(data) {
                        $("#daftar").empty();
                        $("#daftar").append(data);
                    }
                     // $("#daftar").empty();
                     // $("#daftar").append(data);

                });
            });
            $("#button_art1").click(function(){
                // $("#button_tukang").css("background-color","#d9a73d");
                // $("#button_art").css("background-color","lightgray");
                $.ajax({
                type: 'get',
                url: 'ajax/tukang',
                success: function(data) {
                    $("#daftar").empty();
                    $("#daftar").append(data);
                }
            });
            });
        });
    </script>

@endsection
