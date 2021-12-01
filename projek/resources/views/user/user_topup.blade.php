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
        <!-- <div style="display:inline-block;margin-top: 20px;">
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
                            <button type="submit" class="btnBottom" id="btncart" style="margin-left:10px;">Next</button>
                        </form>
                        <button type="submit" class="btnBottom" id="btncart" style="margin-left:10px;">Next</button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- NEW GRID -->
        <style>
            body{
                margin-top:0px;
                background:#FAFAFA;
            }
            .order-card {
                color: #fff;
            }

            .bg-c-blue {
                background: linear-gradient(45deg,#4099ff,#73b4ff);
            }

            .bg-c-green {
                background: linear-gradient(45deg,#2ed8b6,#59e0c5);
            }

            .bg-c-yellow {
                background: linear-gradient(45deg,#FFB64D,#ffcb80);
            }

            .bg-c-pink {
                background: linear-gradient(45deg,#FF5370,#ff869a);
            }


            .card {
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
                box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
                border: none;
                margin-bottom: 30px;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }

            .card .card-block {
                padding: 25px;
            }

            .order-card i {
                font-size: 26px;
            }

            .f-left {
                float: left;
            }

            .f-right {
                float: right;
            }
            .gradient1{
                background-image: url('/img/gradient1.png');
            }
            .gradient2{
                background-image: url('/img/gradient2.png');
                height: 138px;
            }
            .gradient3{
                background-image: url('/img/gradient3.png');
                height: 138px;
            }
            a:hover{
                text-decoration: none;
            }
            .imgAdd{
                width:20px;
                height:20px;
            }
            .imgMinus{
                width:20px;
                height:20px;
            }
            .btnPlus{
                background:transparent;
                border:none;
            }
            .btnPlus:focus{
                outline: none;
            }
            .btnMinus{
                background:transparent;
                border:none;
            }
            .btnMinus:focus{
                outline: none;
            }
            .plusMinus{
                margin:auto;text-align:center;margin-top:10px;
            }
        </style>
        <div class="container" style="margin-top:32px;">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card gradient1">
                        <div class="card-block">
                            <h5 class="m-b-20">Saldo</h5>
                            <h2><span>Rp. 10.000</span></h2>

                            <p class="m-b-0 plusMinus"><span class="">
                                <button class="btnMinus" type="button" id="btnkurang10k" style=""><img class="imgMinus" src="{{ url('img/minus.png') }}" alt=""></button>
                                <input type="text" name="hid10k" id="hid10k" value="0" style="width:40px;text-align:center;color:white;background:transparent;border:none;">
                                <button class="btnPlus" type="button" id="btntambah10k" style=""><img class="imgAdd" src="{{ url('img/add.png') }}" alt=""></button>
                            </span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card gradient1">
                        <div class="card-block">
                            <h5 class="m-b-20">Saldo</h5>
                            <h2><span>Rp. 20.000-</span></h2>
                            <p class="m-b-0 plusMinus"><span class="">

                                <button class="btnMinus" type="button" id="btnkurang20k" style=""><img class="imgMinus" src="{{ url('img/minus.png') }}" alt=""></button>
                                <input type="text" name="hid20k" id="hid20k" value="0" style="width:40px;text-align:center;color:white;background:transparent;border:none;">
                                <button class="btnPlus" type="button" id="btntambah20k" style=""><img class="imgAdd" src="{{ url('img/add.png') }}" alt=""></button>

                            </span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card gradient1">
                        <div class="card-block">
                            <h5 class="m-b-20">Saldo</h5>
                            <h2><span>Rp. 50.000-</span></h2>
                            <p class="m-b-0 plusMinus"><span class="">

                                <button class="btnMinus" type="button" id="btnkurang50k" style=""><img class="imgMinus" src="{{ url('img/minus.png') }}" alt=""></button>
                                <input type="text" name="hid50k" id="hid50k" value="0" style="width:40px;text-align:center;color:white;background:transparent;border:none;">
                                <button class="btnPlus" type="button" id="btntambah50k" style=""><img class="imgAdd" src="{{ url('img/add.png') }}" alt=""></button>

                            </span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card gradient1">
                        <div class="card-block">
                            <h5 class="m-b-20">Saldo</h5>
                            <h2><span>Rp. 75.000-</span></h2>
                            <p class="m-b-0 plusMinus"><span class="">

                                <button class="btnMinus" type="button" id="btnkurang75k" style=""><img class="imgMinus" src="{{ url('img/minus.png') }}" alt=""></button>
                                <input type="text" name="hid75k" id="hid75k" value="0" style="width:40px;text-align:center;color:white;background:transparent;border:none;">
                                <button class="btnPlus" type="button" id="btntambah75k" style=""><img class="imgAdd" src="{{ url('img/add.png') }}" alt=""></button>

                            </span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card gradient1">
                        <div class="card-block">
                            <h5 class="m-b-20">Saldo</h5>
                            <h2><span>Rp. 100.000</span></h2>
                            <p class="m-b-0 plusMinus"><span class="">

                                <button class="btnMinus" type="button" id="btnkurang100k" style=""><img class="imgMinus" src="{{ url('img/minus.png') }}" alt=""></button>
                                <input type="text" name="hid100k" id="hid100k" value="0" style="width:40px;text-align:center;color:white;background:transparent;border:none;">
                                <button class="btnPlus" type="button" id="btntambah100k" style=""><img class="imgAdd" src="{{ url('img/add.png') }}" alt=""></button>

                            </span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card gradient1">
                        <div class="card-block">
                            <h5 class="m-b-20">Saldo</h5>
                            <h2><span>Rp. 125.000-</span></h2>
                            <p class="m-b-0 plusMinus"><span class="">

                                <button class="btnMinus" type="button" id="btnkurang125k" style=""><img class="imgMinus" src="{{ url('img/minus.png') }}" alt=""></button>
                                <input type="text" name="hid125k" id="hid125k" value="0" style="width:40px;text-align:center;color:white;background:transparent;border:none;">
                                <button class="btnPlus" type="button" id="btntambah125k" style=""><img class="imgAdd" src="{{ url('img/add.png') }}" alt=""></button>

                            </span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card gradient1">
                        <div class="card-block">
                            <h5 class="m-b-20">Saldo</h5>
                            <h2><span>Rp. 190.000-</span></h2>
                            <p class="m-b-0 plusMinus"><span class="">

                                <button class="btnMinus" type="button" id="btnkurang190k" style=""><img class="imgMinus" src="{{ url('img/minus.png') }}" alt=""></button>
                                <input type="text" name="hid190k" id="hid190k" value="0" style="width:40px;text-align:center;color:white;background:transparent;border:none;">
                                <button class="btnPlus" type="button" id="btntambah190k" style=""><img class="imgAdd" src="{{ url('img/add.png') }}" alt=""></button>

                            </span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-yellow order-card gradient1">
                        <div class="card-block">
                            <h5 class="m-b-20">Saldo</h5>
                            <h2><span>Rp. 250.000-</span></h2>

                            <p class="m-b-0 plusMinus"><span class="">

                                <button class="btnMinus" type="button" id="btnkurang250k" style=""><img class="imgMinus" src="{{ url('img/minus.png') }}" alt=""></button>
                                <input type="text" name="hid250k" id="hid250k" value="0" style="width:40px;text-align:center;color:white;background:transparent;border:none;">
                                <button class="btnPlus" type="button" id="btntambah250k" style=""><img class="imgAdd" src="{{ url('img/add.png') }}" alt=""></button>


                            </span></p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div style="display:inline-block;width:100%;margin-top:20px;padding:0px 1.2%;">
                    <div style="float:left">
                        <a href="{{ url('/home/user') }}"><button type="submit" class="btn btn-danger" style="color:white;padding:12px 20px;font-size:18px;">Back</button></a>
                    </div>

                    <div style="float:right;">
                        <button type="submit" class="btn btn-warning" id="btncart" style="color:white;padding:12px 20px;font-size:18px;">Next</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- NEW GRID -->


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

            $("#btnkurang10k").click(function(){
                var temp=$('#hid10k').val();
                if(temp>0){
                    var temp1 = parseInt(temp) - 1;
                    $('#hid10k').val(temp1);
                }
                // data.push("10k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btnkurang20k").click(function(){
                var temp=$('#hid20k').val();
                if(temp>0){
                    var temp1 = parseInt(temp) - 1;
                    $('#hid20k').val(temp1);
                }
                // data.push("20k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btnkurang50k").click(function(){
                var temp=$('#hid50k').val();
                if(temp>0){
                    var temp1 = parseInt(temp) - 1;
                    $('#hid50k').val(temp1);
                }
                // data.push("50k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btnkurang75k").click(function(){
                var temp=$('#hid75k').val();
                if(temp>0){
                    var temp1 = parseInt(temp) - 1;
                    $('#hid75k').val(temp1);
                }

                // data.push("75k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btnkurang100k").click(function(){
                var temp=$('#hid100k').val();
                if(temp>0){
                    var temp1 = parseInt(temp) - 1;
                    $('#hid100k').val(temp1);
                }

                // data.push("100k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btnkurang125k").click(function(){
                var temp=$('#hid125k').val();
                if(temp>0){
                    var temp1 = parseInt(temp) - 1;
                    $('#hid125k').val(temp1);
                }

                // data.push("100k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btnkurang190k").click(function(){
                var temp=$('#hid190k').val();
                if(temp>0){
                    var temp1 = parseInt(temp) - 1;
                    $('#hid190k').val(temp1);
                }

                // data.push("100k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
            $("#btnkurang250k").click(function(){
                var temp=$('#hid250k').val();
                if(temp>0){
                    var temp1 = parseInt(temp) - 1;
                    $('#hid250k').val(temp1);
                }

                // data.push("100k");
                // sessionStorage.clear();
                // sessionStorage.setItem("data",data);
            });
        });

    </script>
    @endsection
