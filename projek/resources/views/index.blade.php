<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <title>Babowe</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar navbar-light fixed-top"  style="background-color: rgba(255,255,255,0.9);  background-image: linear-gradient( rgba(0,0,0,0.1),rgba(220,220,220,0),rgba(225,225,225,0));position:fixed;height:75px" >
      <div class="container">
        <a class="navbar-brand" id="gambar"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            {{-- <a class="nav-item nav-link active" href="#">Home</a> --}}
            {{-- <a class="nav-item nav-link " href="#" >Features</a> --}}
            <a class="nav-item nav-link" href="#About">About Us</a>
            <button type ="button" class="btn btn-primary tombol" data-toggle="modal" data-target="#SignInModal">Sign In</button>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Sign In Modal -->
    @if (isset($sukses))
        <script>alert("Register berhasil!")</script>
    @endif

    <div class="modal fade" id="SignInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Sign In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="/checkLogin" method="post">
            @csrf
            <div class="modal-body">
            Email : <br>
            <input type="email" name="user_login_email" id="" > <br>
            Password : <br>
            <input type="password" name="user_login_pass" id="" >
            </div>
            @if (Session::has('eror'))
                <div class="errormsg" style="color: red">
                    <ul>
                        <li>{{Session::get('eror')}}</li>
                    </ul>
                </div>
            @endif
            @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
            <div class="modal-footer">
            <a href="#" class="regislink" data-toggle="modal" data-target="#RegisterModal" data-dismiss="modal">Don't have account?</a>
            <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- RegisterModal -->
  <div class="modal fade" id="RegisterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" action="{{ url('/register')}}" method="post">
            @csrf
          <div class="modal-body">
            Name : <br>
            <input type="text" name="nama_user" id=""> <br>
            Email : <br>
            <input type="email" name="email_user" id=""><br>
            No.Telp : <br>
            <input type="text" name="telp_user" id=""><br>
            Alamat : <br>
            <input type="text" name="alamat_user" id=""><br>
            Password : <br>
            <input type="password" name="password_user" id=""><br>
            Confirm Password : <br>
            <input type="password" name="confirm_password" id=""> <br>
            Photo : <br>
            <input type="file" name="user_photo" id="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="#" class="loginlink" data-toggle="modal" data-target="#SignInModal" data-dismiss="modal">Go To Sign In</a>
          </div>
        </form>

        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif
        @if(isset($errorEmail))
            <div class="errormsg" style="color: red">
                <ul>
                    <li>{{$errorEmail}}</li>
                </ul>
            </div>
        @endif
      </div>
    </div>
  </div>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Get work done faster <br>and better with us</h1>
        <!-- <a class="nav-item btn btn-primary tombol" style="margin-bottom: 30px;" href="#">Our Work</a> -->
      </div>
    </div>
    <!-- Akhir jumbotron -->

    <!-- Container -->
    <div style="margin-top:-32px;">

      <!-- info panel -->
      <!-- <div class="row justify-content-center">
        <div class="col-10 info-panel">
          <div class="row">
            <div class="col-lg">
              <img src="img/employee.png" alt="employee" class="float-left">
              <h4>24 Hours</h4>
              <P>Lorem ipsum dolor sit amet.</P>
            </div>
            <div class="col-lg">
              <img src="img/hires.png" alt="Hires" class="float-left">
              <h4>High Res</h4>
              <P>Lorem ipsum dolor sit amet.</P>
            </div>
            <div class="col-lg">
              <img src="img/security.png" alt="Security" class="float-left">
              <h4>Security</h4>
              <P>Lorem ipsum dolor sit amet.</P>
            </div>
          </div>
        </div>
      </div> -->
      <!-- akhir info panel -->

      <!-- bagian Work like at home -->
      <div class="row justify-content-center" style="padding: 10% 0 10% 0; background-color:#f2f2f2;">
        <div class="container">
          <h2>Need Help Right Away?</h2>
          <p>We specialize in making routine maintenance and emergency repair experiences worry free. Give us a call today to learn how simple our process truly is!</p>
        </div>
      </div>

      <div class="container">
        <div class="row justify-content-center" style="padding:40px 0 30px 0;">
            <div class="col-lg">
              <img src="img/plumber.png" alt="workingspace" class="img-fluid">
              <p style="padding-top:35px;">By planning ahead you can save yourself from feeling stressed and overwhelmed. Our Repair Services is the handyman service provider trusted throughout Indonesia.</p>
            </div>
            <div class="col-lg">
              <h1 style="color:#e71a23">BOOK NOW</h1>
              <!-- <a class="nav-item btn btn-primary tombol" href="#">GALLERY</a> -->
              <img src="img/electrician.png" alt="workingspace" class="img-fluid" style="margin-top:25px;">
            </div>
        </div>
      </div>

      <div class="row justify-content-center" style="padding:40px 0 30px 0;background-color:#f2f2f2;">
        <div class="container">
          <div class="col-lg">
            <h1 style="margin-bottom:20px;">About</h1>
            <a id="About">
              <p style="line-height:25px;">BABOWE is Web Application that will help you to find your trustful,high quality, with great service Handyman and Household Assistant
                Your satisfy is our happiness.

                Babowe started to operate from 2021 at first, we  want to help
              </p>
            </a>
          </div>
        </div>
      </div>

      <!-- Akhir work like at home -->

    </div>
    <!-- akhir container -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    $(document).ready(function() {
        finish_transaksi();
    });
    function finish_transaksi(){
        $.ajax({
        type: 'post',
        url: '/finish_transaksi',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{
            _token: '{{csrf_token()}}'
        },
        success: function(data) {
        }
    });
    }
    setInterval(() => {
        finish_transaksi();
    }, 500);
</script>
