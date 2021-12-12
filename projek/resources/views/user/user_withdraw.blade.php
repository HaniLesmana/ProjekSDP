    @extends('user.base-layout')
    <!-- Navbar -->
    @section('header')
        @include('user.navbarUser')
    @endsection

    @section('main')
    <div class="container">
    <h2>Withdraw</h2>
    <form method="post" action="{{ url('/user/do_wd') }}">
        @csrf
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
            <h5 style="background-color:#95D1CC;height:45px;padding-top:10px;padding-left:20px;border-radius:5px">Saldo: Rp.{{$saldo}}</h5>
            <input class="form-control" type="number" name="total" placeholder="Total withdraw">
            <div class="row">
                <div style="display:inline-block;width:100%;margin-top:20px;padding:0px 1.2%;">
                    <div style="float:left">
                        <a href="{{ url('/home/user') }}"><button type="button" class="btn btn-danger" style="color:white;padding:12px 20px;font-size:18px;">Cancel</button></a>
                    </div>

                    <div style="float:right;">
                        <button type="button" class="btn btn-warning" id="btncart" data-toggle="modal" data-target="#exampleModal" style="color:white;padding:12px 20px;font-size:18px;">Withdraw</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- NEW GRID -->

        {{-- modal detail --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Withdraw Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Are you sure?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </div>
            </div>
        </div>
    </form>
        <table class="table table-striped" style="margin-top: 100px">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Tanggal</th>
                <th scope="col">Total</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($wd as $p=>$i)
                <tr>
                    <th scope="row">{{$p+1}}</th>
                    <td>{{$i->htranstpwd_tanggal}}</td>
                    <td>{{$i->htranstpwd_total}}</td>
                    <td>{{($i->htranstpwd_status == 2) ? 'Pending' : 'Success'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
