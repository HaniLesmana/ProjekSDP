@extends('user.base-layout')
    <!-- Navbar -->
    @section('header')
        @include('user.navbarUser')
    @endsection
    <!-- Akhir Navbar -->
    @section('main')
    <div class="container">
        <form  method="post" action="{{ url('home/do_pembayaran') }}">
            @csrf
        <div class="shadow-lg p-3 mb-5 bg-white rounded">

            <h2>Metode Bayar</h2>
            <hr style="margin-top:20px;">

            <div id="contItems">
                <div style="float:left;" class="mr-4">
                    <label class="lab" style="line-height:20px;">Total</label><br>
                    <label class="lab" style="line-height:20px;">Voucher</label><br>
                    <label class="lab" style="line-height:20px;">Potongan</label>
                </div>
                <div style="float:left;">
                    <input type="hidden" id="tot" value="{{$total}}">
                    <label class="lab" style="line-height:20px;">{{$total}}</label><br>

                    <select class="form-control-sm" name="datavoucher" id="dt" style="float:left;">
                        <option value="-1">-</option>
                        @foreach ($user_voucher as $uv)
                            <option value="{{$uv->id}}">{{$uv->voucher->voucher_nama}}</option>
                        @endforeach
                    </select>

                    <br>
                        @foreach ($user_voucher as $uv)
                            <input type="hidden" id="P{{$uv->id}}" value="{{$uv->voucher->voucher_potongan}}">
                        @endforeach
                    <label class="lab" style="line-height:20px;" id="txtpotongan">0</label>

                </div>
            </div>
            <div style="clear: both;"></div>
            <hr>
            <div>
                <div style="float:right;">
                    <label style="color:grey;font-weight:semibold;font-size:20px;" id="total">Total :  {{$total}}</label>
                    {{-- {{-- <input type="hidden" name="txttotalhidden" id="total" value="{{$total}}"> --}}
                    <input type="hidden" name="totalhidden" id="totalhidden" value="{{$total}}">
                    {{-- <input type="hidden" name="" id="txttotalhidden" value="{{$total}}"> --}}
                    <button type="submit" class="btn btn-warning" style="color:white;margin-left:10px;margin-top:-5px;" onclick="btncheckout()">Checkout</button>
                </div>
                <div style="clear:both"></div>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('[name=datavoucher]').on('change', function() {
                if(this.value==-1){
                    var temp=$('#tot').val();
                    $('#txtpotongan').html("0");
                    $('#total').html("Total : "+temp);
                    $('#totalhidden').val(temp);
                    //alert($("#"+"P"+this.value).val()+"zzzzz");
                    //alert($('#txtpotongan').html());
                }
                else{
                    $('#txtpotongan').html($("#"+"P"+this.value).val());
                    var temp=$('#tot').val()-parseInt($('#txtpotongan').html());
                    $('#total').html("Total : "+temp);
                    $('#totalhidden').val(temp);
                    //alert( $('[name=datavoucher]').val());
                    //alert($('#txtpotongan').html());
                }
            });
        });

    </script>
    @endsection
