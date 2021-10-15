@extends('user.base-layout')
    <!-- Navbar -->
    @section('header')
        @include('user.navbarUser')
    @endsection

    @section('main')
    <div class="container">
    <h2>Top Up</h2>
    <form method="post" action="{{ url('/user/gotocart') }}">
        @csrf
        <div style="display:inline-block;margin-top: 20px;">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="text-align:center;font-size:25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                        <div class="card-body" >Rp. 10.000</div>
                        <input type="text" readonly name="hid10k" id="hid10k" value="0" style="text-align:center;color:white;background:transparent;border:none;">
                        <button class="btnAdd" type="button" id="btntambah10k" onmouseover="" style="margin-bottom:-10px;">+</button>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                        <div class="card-body" >Rp. 20.000</div>
                        <input type="text" name="hid20k" id="hid20k" value="0" style="text-align:center;color:white;background:transparent;border:none;">
                        <button class="btnAdd" type="button" id="btntambah20k" style = "margin-bottom:-10px;">+</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                        <div class="card-body" >Rp. 50.000</div>
                        <input type="text" name="hid50k" id="hid50k" value="0" style="text-align:center;color:white;background:transparent;border:none;">
                        <button class="btnAdd" type="button" id="btntambah50k" style = "margin-bottom:-10px;">+</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                        <div class="card-body" >Rp. 75.000</div>
                        <input type="text" name="hid75k" id="hid75k" value="0" style="text-align:center;color:white;background:transparent;border:none;">
                        <button class="btnAdd" type="button" id="btntambah75k"style = "margin-bottom:-10px;">+</button>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:inline-block;margin-top: 20px;">
            <div class="row">
                <div class="col-md-3">
                <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                    <div class="card-body" >Rp. 100.000</div>
                    <input type="text" name="hid100k" id="hid100k" value="0" style="text-align:center;color:white;background:transparent;border:none;">
                    <button class="btnAdd" id="btntambah100k" type="button" onmouseover="" style = "margin-bottom:-10px;">+</button>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                    <div class="card-body" >Rp. 125.000</div>
                    <input type="text" name="hid125k" id="hid125k" value="0" style="text-align:center;color:white;background:transparent;border:none;">
                    <button class="btnAdd" id="btntambah125k" type="button" style = "margin-bottom:-10px;">+</button>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                    <div class="card-body" >Rp. 190.000</div>
                    <input type="text" name="hid190k" id="hid190k" value="0" style="text-align:center;color:white;background:transparent;border:none;">
                    <button class="btnAdd" id="btntambah190k" type="button" style = "margin-bottom:-10px;">+</button>
                </div>
                </div>
                <div class="col-md-3">
                <div class="card" style="text-align:center;font-size: 25px;float:left;margin-left : 20px;color:white;outline:none;box-shadow:none;width:250px;background-color:#d9a73d">
                    <div class="card-body" >Rp. 250.000</div>
                    <input type="text" name="hid250k" id="hid250k" value="0" style="text-align:center;color:white;background:transparent;border:none;">
                    <button class="btnAdd" type="button" id="btntambah250k" style = "margin-bottom:-10px;">+</button>
                </div>
                </div>

                <div class="row">
                    <div style="display:inline-block;width:250px;margin-top:100px;position:fixed;left:15%;bottom:50px;">
                        <a href="{{ url('/home/user') }}"><button type="submit" class="btnBottom">Back</button></a>
                        <form action="{{ url('user/cart') }}" method="post">
                            <!-- <button type="submit" class="btnBottom" id="btncart" style="margin-left:10px;">Next</button> -->
                        </form>
                        <button type="submit" class="btnBottom" id="btncart" style="margin-left:10px;">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

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
                var temp=$('#hid10k').val();
                var temp1 = parseInt(temp) + 1;
                $('#hid10k').val(temp1);
                // data.push("10k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btntambah20k").click(function(){
                var temp=$('#hid20k').val();
                var temp1 = parseInt(temp) + 1;
                $('#hid20k').val(temp1);
                // data.push("20k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btntambah50k").click(function(){
                var temp=$('#hid50k').val();
                var temp1 = parseInt(temp) + 1;
                $('#hid50k').val(temp1);
                // data.push("50k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btntambah75k").click(function(){
                var temp=$('#hid75k').val();
                var temp1 = parseInt(temp) + 1;
                $('#hid75k').val(temp1);
                // data.push("75k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btntambah100k").click(function(){
                var temp=$('#hid100k').val();
                var temp1 = parseInt(temp) + 1;
                $('#hid100k').val(temp1);
                // data.push("100k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btntambah125k").click(function(){
                var temp=$('#hid125k').val();
                var temp1 = parseInt(temp) + 1;
                $('#hid125k').val(temp1);
                // data.push("100k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btntambah190k").click(function(){
                var temp=$('#hid190k').val();
                var temp1 = parseInt(temp) + 1;
                $('#hid190k').val(temp1);
                // data.push("100k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btntambah250k").click(function(){
                var temp=$('#hid250k').val();
                var temp1 = parseInt(temp) + 1;
                $('#hid250k').val(temp1);
                // data.push("100k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            // $("#btncart").click(function(){
            //     alert("b");
            //     $.ajax({
            //         type: "get",
            //         url: 'ajax1',
            //         data:{data:"1"},
            //         success: function(msg){
            //             // $('.answer').html(msg);
            //             alert("b");
            //         }
            //     });
            // });

        });

    </script>
    @endsection
