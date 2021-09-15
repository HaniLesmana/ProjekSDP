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
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <title>Babowe</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar navbar-light fixed-top"  style="background-color: rgba(255,255,255,0.9);  background-image: linear-gradient( rgba(0,0,0,0.1),rgba(220,220,220,0),rgba(225,225,225,0));" >
      <div class="container">
        <a class="navbar-brand" id="gambar" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="#">Home</a>
            <a class="nav-item nav-link " href="#" >Features</a>
            <a class="nav-item nav-link" href="#About">About</a>
            <button type ="button" class="btn btn-primary tombol" data-toggle="modal" data-target="#SignInModal">Sign In</button>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Sign In Modal -->
    @if ($errors->any())
        <script>alert("Email atau password salah")</script>
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
            <input type="email" name="user_login_email" id=""> <br>
            Password : <br>
            <input type="password" name="user_login_pass" id="">
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Sign In</button>
            <a href="#" class="regislink" data-toggle="modal" data-target="#RegisterModal" data-dismiss="modal">Go to Register</a>
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
        <div class="modal-body">
          Name : <br>
          <input type="text" name="" id=""> <br>
          Email : <br>
          <input type="email" name="" id=""><br>
          Password : <br>
          <input type="password" name="" id=""><br>
          Confirm Password : <br>
          <input type="password" name="" id="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Register</button>
          <a href="#" class="loginlink" data-toggle="modal" data-target="#SignInModal" data-dismiss="modal">Go To Sign In</a>
        </div>
      </div>
    </div>
  </div>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Get work done faster <br>& better with Us</h1>
        <a class="nav-item btn btn-primary tombol" style="margin-bottom: 30px;" href="#">Our Work</a>
      </div>
    </div>
    <!-- Akhir jumbotron -->

    <!-- Container -->
    <div class="container">

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
      <!-- About -->
      <a id="About"><h1>About</h1>
        <p>BABOWE is Web Application that will help you to find your trustful,high quality, with great service Handyman and Household Assistant
          Your satisfy is our happiness.

          Babowe started to operate from 2021 at first, we  want to help
        </p>
       </a>

    </div>
    <!-- akhir container -->












    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
