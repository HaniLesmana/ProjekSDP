@extends('user.base-layout')
    <!-- Navbar -->
    @section('header')
        @include('user.navbarUser')
    @endsection
    <!-- Akhir Navbar -->
    @section('main')
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key=env('MIDTRANS_CLIENT_KEY')></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <div class="container">
        <form action="{{ url('/user/gotocheckout') }}" method="post">
            @csrf
        <div class="table-responsive">
            <table class="table table-striped" id="divBod">
                <thead style="background-color:#E8D0B3;">
                    <tr>
                        <th>Nominal</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                @if (isset($data))
                    @foreach(json_decode($data,true) as $dat)
                    <tbody>
                        @if($dat['jumlah'] != 0)
                        <div id="tester">
                            <td><p for="" value="{{$dat['id']}}" id="{{$dat['id']}}" style="">{{ $dat['nama'] }} </p></td>
                            <td><input type="number" name="{{$dat['id']}}" id="{{$dat['id']}}" onchange="numberclick('{{ $dat['id'] }}','{{ $dat['jumlah'] }}')" class="btnclick" style="width:50px;margin-left:10px;" value ="{{ $dat['jumlah'] }}" readonly></td>
                            <input type="hidden" name="data" value="{{$data}}">
                        </div>

                        @endif
                    </tbody>
                    @endforeach
                @endif
        </table>
        <label for="">Total : </label>
        <label for="" id="total">{{ $total }}</label>

        <!-- <div class="row">

        </div>

        <div style="display:inline-block;width:250px;margin-top:20px;margin-bottom:25px;">
            <a href="{{ url('/home/user_topup') }}"><button type="submit" class="btnBottom">Back</button></a>

            <button type="submit" class="btn btn-warning" id="btncart" style="color:white;padding:12px 20px;font-size:18px;" style="margin-left:10px;">Checkout</button>
            <input type="hidden" name="total" value="{{ $total }}">


        </div> -->

        <div style="display:inline-block;width:100%;margin-top:20px;padding:0px 0%;">
            <div style="float:left">
                <a href="{{ url('/home/user_topup') }}"><button type="submit" class="btn btn-danger" style="color:white;padding:12px 20px;font-size:18px;">Back</button></a>
            </div>

            <div style="float:right;">
            <input type="hidden" name="total" value="{{ $total }}">
                <button type="submit" class="btn btn-warning" id="btncart" style="color:white;padding:12px 20px;font-size:18px;">Checkout</button>
            </div>
        </div>

        @if (isset($bayar))
            <script>
                window.snap.pay("{{$bayar}}");
            </script>
        @endif
        </form>
    </div>

    <!-- <script type="text/javascript" src="/js/functions.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            hitungUlang();
            total = document.getElementById("total");
            // btn10 = $("#btn10").get();
            // btn20 = $("#btn20").get();
            // btn50 = $("#btn50").get();
            // btn75 = $("#btn75").get();
            // $(".btnclick").click(function(){
            //     //alert($("#btn10").html());
            //     if($("#btn10").html()==){}
            //     // var replace=str_replace();
            //     var total = $("#total").html();
            //     $("#total").val(totalInt+"");
            // });
            // var payButton = document.getElementById('btncart');
            // payButton.addEventListener('click', function () {
            //     // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            //     window.snap.pay('TRANSACTION_TOKEN_HERE');
            //     // customer will be redirected after completing payment pop-up
            // });
        });

        function hitungUlang(){
            var temp = $("#btn10").parent().prop("id");
            // var tempe2 = $("#".concat(temp)).parent().prop("id");
            // alert(temp);
            // alert(tempe2);
        }

        function numberclick(id,jumlah){
            // $("#").children();
            // var a=0;
            // if(id == "btn10"){
            //     //var b=  //nominal
            //     //var c= //jumlah
            //     a=a+(b*c);
            //     var inp = $(id).html();
            //     var temp = $('#total').html();
            //     total = parseInt(temp) + (inp * jumlah);
            //     alert(total);

            // }
            // else if(id == "btn20"){
            //     var temp = $('#total').html();
            //     total = parseInt(temp) + 20000;
            //     alert(total);
            //     $("#total").html(total+"");
            // }
            // else if(id == "btn50"){
            //     var temp = $('#total').html();
            //     total = parseInt(temp) + 20000;
            //     alert(total);
            //     $("#total").html(total+"");
            // }
            // $("#total").html(total+"");
        }
    </script>
    @endsection
