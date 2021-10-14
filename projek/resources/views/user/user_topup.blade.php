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
    <h2>Top Up</h2>
    <div style="display:inline-block;margin-top: 20px;">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="text-align:center;font-size:25px;float:left;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                    <div class="card-body" >Rp. 10.000</div>
                    <button class="btnAdd" type="submit" id="btntambah10k" onmouseover="" style = "margin-bottom:-10px;">+</button>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                    <div class="card-body" >Rp. 20.000</div>
                    <button class="btnAdd" type="submit" id="btntambah20k" style = "margin-bottom:-10px;">+</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                    <div class="card-body" >Rp. 50.000</div>
                    <button class="btnAdd" type="submit" id="btntambah50k" style = "margin-bottom:-10px;">+</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                    <div class="card-body" >Rp. 75.000</div>
                    <button class="btnAdd" type="submit" id="btntambah75k" style = "margin-bottom:-10px;">+</button>
                </div>
            </div>
        </div>
    </div>

    <div style="display:inline-block;margin-top: 20px;">
        <div class="row">
            <div class="col-md-3">
            <div class="card" style="text-align:center;font-size: 25px;float:left;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                <div class="card-body" >Rp. 100.000</div>
                <button class="btnAdd" type="submit" id="btntambah100k" onmouseover="" style = "margin-bottom:-10px;">+</button>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                <div class="card-body" >Rp. 125.000</div>
                <button class="btnAdd" type="submit" id="btntambah125k" style = "margin-bottom:-10px;">+</button>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                <div class="card-body" >Rp. 190.000</div>
                <button class="btnAdd" type="submit" id="btntambah190k" style = "margin-bottom:-10px;">+</button>
            </div>
            </div>
            <div class="col-md-3">
            <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                <div class="card-body" >Rp. 250.000</div>
                <button class="btnAdd" type="submit" id="btntambah250k" style = "margin-bottom:-10px;">+</button>
            </div>
            </div>

            <div class="row">
            <div style="display:inline-block;width:250px;margin-top:100px;position:fixed;left:13%;bottom:50px;">
                <a href="{{ url('/home/user') }}"><button type="submit" class="btnBottom">Back</button></a>
                <form action="{{ url('user/cart') }}" method="post">
                    <button type="submit" class="btnBottom" id="btncart" style="margin-left:10px;">Cart</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    </div>

    <footer>

    </footer>

    <!-- <script type="text/javascript" src="/js/functions.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var data=[];
            if(sessionStorage.getItem("data")!=null){
                data=[];
                data.push(sessionStorage.getItem("data"));
            }
            $("#btntambah10k").click(function(){
                data.push("10k");
                sessionStorage.clear();
                sessionStorage.setItem("data",data);
            });
            $("#btntambah20k").click(function(){
                data.push("20k");
                sessionStorage.clear();
                sessionStorage.setItem("data",data);
            });
            $("#btntambah50k").click(function(){
                data.push("50k");
                sessionStorage.clear();
                sessionStorage.setItem("data",data);
            });
            $("#btntambah75k").click(function(){
                data.push("75k");
                sessionStorage.clear();
                sessionStorage.setItem("data",data);
            });
            $("#btntambah100k").click(function(){
                data.push("100k");
                sessionStorage.clear();
                sessionStorage.setItem("data",data);
            });
            $("#btntambah125k").click(function(){
                data.push("100k");
                sessionStorage.clear();
                sessionStorage.setItem("data",data);
            });
            $("#btntambah190k").click(function(){
                data.push("100k");
                sessionStorage.clear();
                sessionStorage.setItem("data",data);
            });
            $("#btntambah250k").click(function(){
                data.push("100k");
                sessionStorage.clear();
                sessionStorage.setItem("data",data);
            });

        });

    </script>
</body>
</html>
