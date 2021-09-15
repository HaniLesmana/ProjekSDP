<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('style_user_home.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('style.css')}}"> -->

    <title>Babowe</title>
  </head>
  <body>
    {{-- LOGIN SUCCESS --}}
    @if (session("welcomeUser"))
        <script>
            alert("{{ session('welcomeUser') }}");
        </script>
    @endif

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(255,255,255,0.9);  background-image: linear-gradient( rgba(0,0,0,0.1),rgba(220,220,220,0),rgba(225,225,225,0));">
        <div class="container">
            <a class="navbar-brand" id="logo" href="#"></a>
            <button class="navbar-toggler" type="button"
            data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="#">HOME <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">PROFILE</a>
                    <a class="nav-item nav-link" href="#About" id="tes">CART</a>
                    <a class="nav-item nav-link" href="#About">HISTORY</a>
                    <button type ="button" class="btn btn-primary tombolSignOut" data-toggle="modal" data-target="#SignInModal">Sign Out</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->


    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container" id="ads">
        <!-- <h1 class="display-4">Get work done faster <br>& better with Us</h1>
        <a class="nav-item btn btn-primary tombol" style="margin-bottom: 30px;" href="#">Our Work</a>
        <a class="navbar-brand" id="gambarart" href="#"></a> -->
      </div>
    </div>
    <!-- Akhir jumbotron -->

    <!-- Container -->
    <div class="container">
      <!-- bagian Work like at home -->
      <div class="row justify-content-center">
        <div class="col-lg">
          <img src="img/workingspace.png" alt="workingspace" class="img-fluid">
        </div>
        <div class="col-lg">
          <h2>You <b>Work</b> Like at <b>Home</b></h2>
          <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya</p>
          <a class="nav-item btn btn-primary tombol" href="#">GALLERY</a>
        </div>
      </div>
      <!-- Akhir work like at home -->

      <a id="About">About</a>
    </div>
    <!-- akhir container -->












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
