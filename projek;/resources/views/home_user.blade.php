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
                    <img class="d-block img-fluid ads" src="https://pbs.twimg.com/media/EF7pxQ0UcAETWZC.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid ads" src="https://ecs7.tokopedia.net/img/kjjBfF/2021/2/9/7621c986-da97-48e2-a389-31ca5f1d228b.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid ads" src="https://esports.id/img/article/76320210531063444.jpg" alt="Third slide">
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
    <div class="container">
      <!-- bagian Work like at home -->
      <div class="row justify-content-center">
        <div class="col-lg">
          <img src="../img/workingspace.png" alt="workingspace" class="img-fluid">
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
