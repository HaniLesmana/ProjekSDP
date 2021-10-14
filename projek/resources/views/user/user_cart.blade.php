<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- My Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="{{asset('style_user_home.css')}}">


    <title>Babowe</title>
    <style>
        .btnAdd{
            background-color:#ad580e;
            color:white;
            border:none;
            font-weight: bold;
            font-size: 20px;
        }
        .card{
            padding-bottom: 10px;
        }
        button.btnAdd:focus {
            outline:none;
        }
        .btnBottom{
            height:50px;
            width:100px;
            font-size:20px;
            background-color:#d9a73d;
            border:none;
            outline:none;
            color:white;
            border-radius:5px;
            float: left;
        }
    </style>
  </head>
  <body>
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
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead style="background-color:#E8D0B3;">
                    <tr>
                        <th>Nominal</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
        @foreach(json_decode($data,true) as $dat)
            @if($dat['jumlah'] != 0)
                    <tbody>
                        <td><label for="" value="a" id="{{$dat['id']}}" style="">{{ $dat['nama'] }} </label></td>
                        <td><input type="number" class="btnclick" style="width:50px;margin-left:10px;" value ="{{ $dat['jumlah'] }}"></td>
                    </tbody>
                </table>
            </div>

            @endif
        @endforeach
        <label for="">Total : </label>
        <label for="" id="total">0</label>

    </div>

    <!-- <script type="text/javascript" src="/js/functions.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
<<<<<<< Updated upstream
            alert("a");
            $("#btn10").mousedown(function(){
                alert("b");
=======
            $("#btn10").mousedown(function(){
>>>>>>> Stashed changes
                var total = $("#total").val();
                //var totalInt = parseInt(total)+10;
                alert(total);
                $("#total").val(totalInt+"");
            });
        });
    </script>
</body>
</html>
